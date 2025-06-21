<?php
require_once __DIR__ . '/vendor/autoload.php';

use \Classes\BracketsValidator;


$bracket_start = '{';
$bracket_end = '}';

$success_case = new BracketsValidator("{{lajkdhf{adfa}{}adfasdfadf{}}}", $bracket_start, $bracket_end);
$fail_case = new BracketsValidator("{{lajkdhf{adfa", $bracket_start, $bracket_end);
?>