<?php
/**
 * Created by PhpStorm.
 * User: lanka
 * Date: 17.02.19
 * Time: 16:38
 */

$list = json_decode(file_get_contents("list.json"), true);
$list = $list["items"];

$example = 'x';



$itemsHash = [];

foreach ($list as $item) {
    $itemsHash[ord($item)] = $item;
}

var_dump($itemsHash);
var_dump($itemsHash[ord($example)]);



$itemsSimple = [];

foreach ($list as $item) {
    if(in_array($item, $itemsSimple)) continue;

    $itemsSimple[] = $item;
}


var_dump($itemsSimple);
var_dump($itemsSimple[array_search($example, $itemsSimple)]);

