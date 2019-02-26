<?php
/**
 * Created by PhpStorm.
 * User: lanka
 * Date: 17.02.19
 * Time: 16:38
 */

function getHashByString($string) {
	$length = strlen($string) - 1;
	$hash = 0;

	for ($i = 0; $i < strlen($string); $i++) {
		$hash += ord($string[$i]);
	}
	return $hash;
}

function findValueInArray($value, $array) {

	$hash = getHashByString($value);

	if (empty($array[$hash])) {
		return null;
	}

	if ($array[$hash] == $value) {
		return $hash;
	}

	while (isset($array[$hash])) {
		$hash++;
		if ($array[$hash] == $value) {
			return $hash;
		}
	}
}

$list = json_decode(file_get_contents("list.json"), true);
$list = $list["items"];

$example = 'x';

$itemsHash = [];

foreach ($list as $item) {
	$hash = getHashByString($item);
	$hashIsSet = isset($itemsHash[$hash]);

	if (!$hashIsSet) {
		$itemsHash[$hash] = $item;
		continue;
	}

	while ($hashIsSet) {
		$hash++;

		if (!isset($itemsHash[$hash])) {
			$itemsHash[$hash] = $item;
			$hashIsSet = false;
		} else {
			if ($itemsHash[$hash] == $item) {
				break;
			}
		}
	}
}

print_r(json_encode($itemsHash));
print("\n");

$itemsSimple = [];

foreach ($list as $item) {
	if (in_array($item, $itemsSimple)) {
		continue;
	}

	$itemsSimple[] = $item;
}

print(json_encode($itemsSimple));
print("\n");
print(json_encode($itemsSimple[array_search($example, $itemsSimple)]));
print("\n");
