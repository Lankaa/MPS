<?php
require_once 'analyzer.php';

$code = file_get_contents('main.c');

$analyzer = new Analyzer($code);
