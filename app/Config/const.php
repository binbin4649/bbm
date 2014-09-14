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
	''=>'カテゴリー',
	'Baseball'=>'野球',
	'Soccer'=>'サッカー',
	'Golf'=>'ゴルフ',
	'F1'=>'F1',
	'Tennis'=>'テニス',
	'Volleyball'=>'バレーボール',
	'Other sports'=>'その他スポーツ',
	'Current topics'=>'時事ネタ',
	'Other'=>'その他'
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