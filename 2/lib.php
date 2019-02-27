<?php
function getHashByString($string) {
	$length = strlen($string);
	$hash = 0;

	for ($i = 0; $i < $length; $i++) {
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