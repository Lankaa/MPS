<?php
require_once 'lib.php';

$list = json_decode(file_get_contents("2/list.json"), true);
$list = $list["items"];

$example = 'variable';
$itemsHash = [];

/*
 * fill hash array
 */

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

//print_r(json_encode(["hash array" => $itemsHash]));
print("\n");

/*
 * search value in hash array
 */
$startTime = microtime(true);
findValueInArray($example, $itemsHash);
$workTime = microtime(true) - $startTime;
print_r(json_encode(["search in hash array" => $workTime]));
print("\n");

$itemsSimple = [];

/*
 * fill simple array
 */
foreach ($list as $item) {
	if (in_array($item, $itemsSimple)) continue;

	$itemsSimple[] = $item;
}

//print(json_encode(["simple array" => $itemsSimple]));
print("\n");

/*
 * find example in simple array
 */
$startTime = 0;
$startTime = microtime(true);
array_search($example, $itemsSimple);
$workTime = microtime(true) - $startTime;
print_r(json_encode(["search in simple array" => $workTime]));
//print_r(json_encode(["key for value($example) in simple array" => array_search($example, $itemsSimple)]));
print("\n");
