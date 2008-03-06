<?php
/**
 * Flashcard generator for my definition sheets generated with
 * Wenlin.
 * 
 * @author Michael Huynh (http://www.mikexstudios.com)   
 */

$filename = $_GET['file'];
$deck_id = $_GET['deck_id'];

$lines = file($filename); //Make sure this file is UTF-8 (not UTF-16 or anything else)

//Regex match lines
foreach($lines as $line)
{	
	if(preg_match('/^(.)(?:\(.+?\))? \[(.+?)\] (.*)$/u', $line, $matches)) //u for unicode
	{	
		$characters[] = trim($matches[1]);
		$pinyins[] = $matches[2];
		$definitions[] = trim($matches[3]);
		$extra[] = trim($in_between);
		
		$in_between = ''; //Clear
	}
	else
	{
		$in_between .= $line;
	}
	
}

//The first entry of extra is the "Lesson # words compiled by.." text. So
//we get rid of it:
array_shift($extra);

echo "<pre>\n";
foreach($characters as $i=>$each_character)
{
	//TODO: Integrate extra-extra information in here.
	echo 'INSERT INTO cards (deck_id, question, answer, extra, extra2) VALUES ('.
				$deck_id.', "'.$each_character.'", "'.addslashes($pinyins[$i]).'", "'.
				addslashes($definitions[$i]).'", "'.addslashes($extra[$i]).'");'."\n";
	//echo trim($extra[$i])."\n\n";
}
echo "</pre>\n";

?>
