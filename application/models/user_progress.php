<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class User_progress extends ActiveRecord {

  function __construct() {
      parent::ActiveRecord();
      $this->_class_name = strtolower(get_class($this));
      $this->_table = 'user_progress';
      $this->_columns = $this->discover_table_columns();
  }

}

?>
