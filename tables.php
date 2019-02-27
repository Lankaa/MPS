<?php
require_once 'lib.php';

$list = json_decode(file_get_contents("list.json"), true);
$list = $list["items"];

$example = '1x';
$itemsHash = [];

/*
 * fill hash array
 */

$start = time();

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

var_dump(time() - $start);

print_r(json_encode(['hash array' => $itemsHash]));
print("\n");

/*
 * search value in hash array
 */

print_r(json_encode(["key for value($example) in hash array" => findValueInArray($example, $itemsHash)]));
print("\n");

$itemsSimple = [];

/*
 * fill simple array
 */
foreach ($list as $item) {
	if (in_array($item, $itemsSimple)) {
		continue;
	}

	$itemsSimple[] = $item;
}

print(json_encode(['simple array ' => $itemsSimple]));
print("\n");

/*
 * find example in simple array
 */
print_r(json_encode(["key for value($example) in hash array" => $itemsSimple[array_search($example, $itemsSimple)]]));
print("\n");
