<?php

/**
 *
 */
class Analyzer {
	private $code;

	private const KEYWORD = ['main', 'for'];

	function __construct($code) {
		$this->code = $code;
	}

	public function getKeyword() {
		$pattern = join('|', self::KEYWORD);
		preg_match("/$pattern/", $this->code, $matches);

		return $matches;
	}
}
