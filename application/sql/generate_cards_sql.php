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
	}
}

foreach($characters as $i=>$each_character)
{

	echo 'INSERT INTO cards (deck_id, question, answer, extra) VALUES ('.$deck_id.', "'.$each_character.'", "'.$pinyins[$i].'", "'.$definitions[$i].'");'."\n";

}

?>
