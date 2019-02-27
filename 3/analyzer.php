<?php

class Analyzer {
	private $code;

	private const KEYWORD = ['main', 'for', 'int'];
	private const VARIABLES = 'int.(.*);';
	private const SEPARATOR = ['\(', '\)', '\{', '\}', '\,', '\;', '\+', '\<', '\>', '\=', '\*'];

	function __construct($code) {
		$this->code = $code;
	}

	private function prepareResponse($response) {
		$preparedResponse = [];

		foreach ($response as $value) {
			if (is_array($value)) {
				foreach ($value as $invalue) {
					$preparedResponse[] = $invalue;
				}
			} else {
				$preparedResponse[] = $value;
			}
		}
		return $preparedResponse;
	}

	private function analyze($pattern) {
		preg_match_all("/$pattern/m", $this->code, $matches);
		return $matches;
	}

	public function getKeyword() {
		return $this->prepareResponse($this->analyze(join('|', self::KEYWORD)));
	}

	public function getSeparator() {
		return $this->prepareResponse($this->analyze(join('|', self::SEPARATOR)));
	}

	public function getVariables() {
		$tmp = $this->analyze(self::VARIABLES)[1];
		$variables = [];

		foreach ($tmp as $var) {
			$variables[] = preg_split('/,/', $var);
		}

		return $this->prepareResponse($variables);

	}

}
