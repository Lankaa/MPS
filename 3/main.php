<?php
require_once 'analyzer.php';

$code = file_get_contents('main.c');

$analyzer = new Analyzer($code);

$keyword = $analyzer->getKeyword();
$variables = $analyzer->getVariables();
$separator = $analyzer->getSeparator();

print_r(json_encode(['keyword' => $keyword]));
print("\n");

print_r(json_encode(['variables' => $variables]));
print("\n");

print_r(json_encode(['separator' => $separator]));
print("\n");
