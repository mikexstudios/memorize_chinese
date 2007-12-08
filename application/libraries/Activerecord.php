<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

/**
 * You can't load the Model class using the autoload file, so we have to
 * include it here for the ActiveRecord class to inherit from
 */

global $application_folder;
require (BASEPATH . '/libraries/Model.php');

/**
 * CodeIgniter ActiveRecord Class
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		Matthew Pennell
 * @version		0.3.2
 * @link		http://codeigniter.com/wiki/ActiveRecord_Class/
 */

/**
 * Define some global types of search
 */

if (!defined('ALL')) define('ALL', 'all');
if (!defined('IS_NULL')) define ('IS_NULL', ' is null');
if (!defined('NOT_NULL')) define ('NOT_NULL', ' <> ""');

class ActiveRecord extends Model {

	/**
	 * Constructor
	 *
	 * @access public
	 */
    function ActiveRecord()
    {
    	parent::Model();
        log_message('debug', "ActiveRecord Class Initialized");
    }

	/**
	 * __call
	 *
	 * Catch-all function to capture method requests for Active Record-style
	 * functions and pass them off to private methods. If no function is
	 * recognised, this acts as a getter/setter (depending on whether any
	 * arguments were passed in).
	 *
	 * @access	public
	 * @param	string
	 * @param	array
	 * @return	function || void
	 * @link	http://uk.php.net/manual/en/language.oop5.overloading.php
	 */	
    public function __call($method, $args)
    {
        if (stristr($method, 'find_by_')) return $this->_find_by(str_replace('find_by_', '', $method), $args);
        if (stristr($method, 'find_all_by_')) return $this->_find_all_by(str_replace('find_all_by_', '', $method), $args);
		if (stristr($method, 'fetch_related_')) return $this->_fetch_related(str_replace('fetch_related_', '', $method), $args);
        if ( ! isset($args) ) eval('return $this->' . $method . ';');
        eval('$this->' . $method . ' = "' . $args[0] . '";');
    }
    
	/**
	 * discover_table_columns
	 *
	 * Called on instantiation of a model to capture the field names
	 * of the related table. By convention, the model name is singular
	 * and the table name is plural.
	 *
	 * Sep 24: Reduced column lookup to one query, as suggested by gunter
	 *
	 * @access	public
	 * @return	object
	 */	
    function discover_table_columns()
    {
    	if ($this->config->item($this->_table . '_table_columns'))
		{
			return $this->config->item($this->_table . '_table_columns');
		}
		else
		{
	    	$columns = $this->db->query('SHOW COLUMNS FROM ' . $this->_table)->result();
			$this->config->set_item($this->_table . '_table_columns', $columns);
	        return $columns;
		}
    }
    
	/**
	 * exists
	 *
	 * Boolean check to see if a record was returned from a query
	 *
	 * @access	public
	 * @return	bool
	 */	
    function exists()
    {
        return isset($this->id);
    }
    
	/**
	 * create
	 *
	 * Shorthand way to create and instantiate a new record in one go.
	 * Pass in a hash of key/value pairs that correspond to the columns
	 * in the relevant table.
	 *
	 * @access	public
	 * @param	array
	 * @return	object
	 */	
    function create($args)
    {
        if ($this->db->insert($this->_table, $args))
        {
            eval('$return = new ' . $this->_class_name . '();');
            foreach($args as $key => $value)
            {
                eval('$return->' . $key . ' = "' . $value . '";');
            }
            $return->id = $this->db->insert_id();
            return $return;
           }
        else
        {
            log_message('error', $this->db->last_query());
        }
    }
    
	/**
	 * delete
	 *
	 * Simple method to delete the current object's record from the database.
	 *
	 * @access	public
	 * @return	void
	 */	
    function delete()
    {
        if ($this->db->delete($this->_table, array('id' => $this->id)))
        {
            unset($this);
        }
        else
        {
            log_message('error', $this->db->last_query());
        }
    }
    
	/**
	 * delete_all
	 *
	 * Delete all records from the associated table. This method does not
	 * need to called on an instantiated object.
	 *
	 * @access	public
	 * @return	void
	 */	
    function delete_all()
    {
        if ($this->db->query('DELETE FROM ' . $this->_table))
        {
            return;
        }
        else
        {
            log_message('error', $this->db->last_query());
        }
    }
    
	/**
	 * save
	 *
	 * Similar to the create() method, but this function assumes that the
	 * corresponding properties have been set on the current object for each
	 * table column.
	 *
	 * @access	public
	 * @return	object
	 */	
    function save()
    {
        $data = array();
        foreach ($this->_columns as $column)
        {
        		/** HACK: We ignore unset columns **/
        		$temp = $column->Field;
            if ($column->Field != 'id' && isset($this->$temp)) 
						{
							eval('$data["`' . $column->Field . '`"] = $this->' . $column->Field . ';');
						}
        }
        if ($this->db->insert($this->_table, $data))
        {
            $this->id = $this->db->insert_id();
           }
        else
        {
            log_message('error', $this->db->last_query());
        }
    }

	/**
	 * update
	 *
	 * Similar to the save() method, except that it will update the row
	 * corresponding to the current object.
	 *
	 * @access	public
	 * @return	void
	 */	
	function update()
	{
		$data = array();
        foreach ($this->_columns as $column)
        {
            if ($column->Field != 'id') eval('$data["`' . $column->Field . '`"] = $this->' . $column->Field . ';');
        }
		$this->db->where('id', $this->id);
        if (!$this->db->update($this->_table, $data))
        {
			log_message('error', $this->db->last_query());
        }
	}

	/**
	 * find
	 *
	 * Basic find function. Either pass in a numeric id to find that table row,
	 * or an array of key/values for a more complex search. Note that passing in 
	 * an array of 1 is stupid, as you can use find_by_fieldname() instead.
	 *
	 * To simply return all records, use the ALL constant: $myobj->find(ALL);
	 *
	 * @access	public
	 * @param	int || array
	 * @return	object || array
	 */	
    function find($args)
    {
        if (is_array($args))
        {
            foreach ($args as $key => $value)
            {
                if (!isset($first_key))
                {
                    $first_key = $key;
                    $first_value = $value;
                }
            }
            array_shift($args);
            $data = array(
                $first_value,
                $args
            );
            return $this->find_all_by($first_key, $data);
        }
        else
        {
        	if ($args != ALL)
			{
	            $query = $this->db->where('id', $args)->from($this->_table)->get();
	            if ($query->num_rows() > 0)
	            {
	            	eval('$return = new ' . $this->_class_name . '();');
	                $found = $query->row();
	                foreach($this->_columns as $column)
	                {
	                    eval('$return->' . $column->Field . ' = $found->' . $column->Field . ';');
	                }
					return $return;
	            }
				else
				{
					return false;
				}
			}
			else
			{
				$query = $this->db->from($this->_table)->get();
		        foreach ($query->result() as $row)
		        {
		            eval('$x = new ' . $this->_class_name . '();');
		            foreach ($this->_columns as $column)
		            {
		                eval('$x->' . $column->Field . ' = $row->' . $column->Field . ';');
		            }
		            $return[] = $x;
		            $x = null;
		        }
		        return $return;
			}
        }
    }
    
	/**
	 * _find_by
	 *
	 * Query by a particular field by passing in a string/int. You can also
	 * pass in an optional hash of additional query modifiers.
	 *
	 * NOTE: This function only ever returns the first record it finds! To
	 * find all matching records, use find_all_by_fieldname();
	 *
	 * @access	private
	 * @param	string
	 * @param	array
	 * @return	object
	 */	
    function _find_by($column, $query)
    {
        $this->db->where($column, $query[0]);
		$this->db->select($this->_table . '.*');
        if (isset($query[1]))
        {
            foreach ($query[1] as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
		if (!isset($query[2]))
		{
			$this->db->from($this->_table);
		}
		else
		{
			$this->db->from($this->_table . ' ' . $query[2]);
		}
        $query = $this->db->get();
		if ($query->num_rows() > 0) {
	        $found = $query->row();
	        eval('$return = new ' . $this->_class_name . '();');
	        foreach($this->_columns as $column)
	        {
	            eval('$return->' . $column->Field . ' = $found->' . $column->Field . ';');
	        }
	        return $return;
		}
		else
		{
			return false;
		}
    }
    
	/**
	 * _find_all_by
	 *
	 * Same as _find_by() except this time it returns all matching records.
	 *
	 * There are some special search terms that you can use for particular searches:
	 * IS_NULL to find null or empty fields
	 * NOT_NULL to find fields that aren't empty or null
	 *
	 * By passing in a second parameter of an array of key/value pairs, you 
	 * can build more complex queries (of course, if it's getting too complex,
	 * consider creating your own function in the actual model class).
	 *
	 * @access	private
	 * @param	string
	 * @param	array
	 * @return	array
	 */	
    function _find_all_by($column, $query)
    {
        $return = array();
		switch ($query[0])
		{
			case IS_NULL:
				$this->db->where($column . IS_NULL);
				break;
			case NOT_NULL:
				$this->db->where($column . NOT_NULL);
				break;
			default:
				$this->db->where($column, $query[0]);
		}
        if (isset($query[1]))
        {
            foreach ($query[1] as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
		if (!isset($query[2]))
		{
			$this->db->from($this->_table);
		}
		else
		{
			$this->db->from($this->_table . ' ' . $query[2]);
		}
        $query = $this->db->get();
        foreach ($query->result() as $row)
        {
            eval('$x = new ' . $this->_class_name . '();');
            foreach ($this->_columns as $column)
            {
                eval('$x->' . $column->Field . ' = $row->' . $column->Field . ';');
            }
            $return[] = $x;
            $x = null;
        }
        return $return;
    }
	
	/**
	 * find_and_limit_by
	 *
	 * Basic find function but with limiting (useful for pagination).
	 * Pass in the number of records and the start index, and optionally
	 * an array, where the first index of the array is an array of
	 * modifiers for the query, and the second index is a JOIN statement
	 * (assuming one is needed).
	 *
	 * @access	public
	 * @param	int
	 * @param	int
	 * @param	array
	 * @return	array
	 */	
	function find_and_limit_by($num, $start, $query = array())
	{
		$return = array();
		$this->db->limit($num, $start);
        if (isset($query[0]))
        {
            foreach ($query[0] as $key => $value)
            {
                $this->db->where($key, $value);
            }
        }
		if (!isset($query[1]))
		{
			$this->db->from($this->_table);
		}
		else
		{
			$this->db->from($this->_table . ' ' . $query[1]);
		}
		$query = $this->db->get();
        foreach ($query->result() as $row)
        {
            eval('$x = new ' . $this->_class_name . '();');
            foreach ($this->_columns as $column)
            {
                eval('$x->' . $column->Field . ' = $row->' . $column->Field . ';');
            }
            $return[] = $x;
            $x = null;
        }
        return $return;
	}
    
	/**
	 * create_relationship
	 *
	 * Create a relationship (i.e. an entry in the relationship table)
	 * between the current object and another one passed in as the first
	 * argument. Or pass in two objects as an anonymous call.
	 *
	 * @access	public
	 * @param	object
	 * @param	object
	 * @return	void
	 */	
    function create_relationship($a, $b = '')
    {
    	if ($b == '')
		{
			$relationship_table = ($this->_table < $a->_table) ? $this->_table . '_' . $a->_table : $a->_table . '_' . $this->_table;
	        $this->db->query('
				INSERT INTO ' . $relationship_table . ' 
					(' . $this->_class_name . '_id, ' . $a->_class_name . '_id) 
				VALUES 
					(' . $this->id . ', ' . $a->id . ')
			');
		}
		else
		{
			$relationship_table = ($a->_table < $b->_table) ? $a->_table . '_' . $b->_table : $b->_table . '_' . $a->_table;
	        $this->db->query('
				INSERT INTO ' . $relationship_table . ' 
					(' . $a->_class_name . '_id, ' . $b->_class_name . '_id) 
				VALUES 
					(' . $a->id . ', ' . $b->id . ')
			');
		}
    }
	
	/**
	 * _fetch_related
	 *
	 * Fetch all related records using the relationship table to establish
	 * relationships. Results are stored as an array of objects in a
	 * property corresponding to the name of the related objects. If the 
	 * singular of the related object isn't logical, pass it in as the
	 * first argument, e.g. $woman->fetch_related_men('man');
	 *
	 * @access	private
	 * @param	string
	 * @param	string
	 * @return	void
	 */	
	function _fetch_related($plural, $singular)
	{
		$singular = ($singular) ? $singular[0] : substr($plural, 0, -1);
		$relationship_table = ($this->_table < $plural) ? $this->_table . '_' . $plural : $plural . '_' . $this->_table;
		$query = $this->db->query('
			SELECT 
				' . $plural . '.* 
			FROM 
				' . $plural . ' 
			LEFT JOIN 
				' . $relationship_table . ' 
			ON 
				' . $plural . '.id = ' . $singular . '_id 
			LEFT JOIN 
				' . $this->_table . ' 
			ON 
				' . $this->_table . '.id = ' . $this->_class_name . '_id 
			WHERE 
				' . $this->_table . '.id = ' . $this->id
		);
		eval('$this->' . $plural . ' = $query->result();');	
	}
    
}

?>
