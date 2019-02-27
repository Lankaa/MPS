<?php
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