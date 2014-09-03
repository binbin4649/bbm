<?php
//static
//usage:    echo FOOBAR;
//define("FOOBAR","テスト");
 
//array
//usage:    $fuga = Configure::read("fuga");
//$config['fuga'] = array("a","b","c");
 
//Associative array
//usage:    $hoge = Configure::read("Category");
$config['Category'] = array(
	'Sports'=>'Sports',
	'Other'=>'Other'
);