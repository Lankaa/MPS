<?php
/**
 * Created by PhpStorm.
 * User: lanka
 * Date: 17.02.19
 * Time: 16:38
 */


function getHashByString($string){
	$length = strlen($string) - 1;
	$hash   = 0;

	for ($i=0 ; $i < strlen($string); $i++ ) { 
		$hash += ord($string[$i]);
	}
	return $hash;
}

$list = json_decode(file_get_contents("list.json"), true);
$list = $list["items"];

$example = "z";





$itemsHash = [];

foreach ($list as $item) {
    $itemsHash[getHashByString($item)] = $item;
}

var_dump($itemsHash);
var_dump($itemsHash[getHashByString($example)]);



$itemsSimple = [];

foreach ($list as $item) {
    if(in_array($item, $itemsSimple)) continue;

    $itemsSimple[] = $item;
}


var_dump($itemsSimple);
var_dump($itemsSimple[array_search($example, $itemsSimple)]);

