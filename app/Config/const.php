<?php
//static
//usage:    echo FOOBAR;
//define("FOOBAR","テスト");
 
//array
//usage:    $fuga = Configure::read("fuga");
//$config['fuga'] = array("a","b","c");
 
//Associative array
//usage:    $category = Configure::read("Category");
$config['Category'] = array(
	''=>'Category',
	'Sports'=>'Sports',
	'Other'=>'Other'
);

$config['state'] = array(
	''=>'State',
	'Up Coming'=>'Up Coming',
	'Bet Now'=>'Bet Now',
	'Bet Finish'=>'Bet Finish',
	'Result'=>'Result',
	'Delete'=>'Delete',
	'Timeover'=>'Timeover'
);