<?php

$input = "int float a = b * c + 10 ,";

$identifiers = "/[a-zA-Z]+[\w]*/";
$constants = "/\d+/"; 
$punctuations = "/[;,:\{\}\(\)\[\]]/"; 
$arithmetic_operators = "/[\+\-\*\/]/";
$keywords = "/(if|else|int|float|class|for|while|double)/";
$tokens = preg_split("/\s+/", $input);

$all_identifiers = '';
$all_constants = '';
$all_punctuations = '';
$all_arithmetic_operators = '';
$all_keywords = '';

$total_identifiers = 0;
$total_constants = 0;
$total_punctuations = 0;
$total_arithmetic_operators = 0;
$total_keywords = 0;

foreach ($tokens as $token) {
    if (preg_match($keywords, $token)) {
        $all_keywords = $all_keywords .' '. $token;
        $total_keywords = $total_keywords + 1;
    } elseif (preg_match($identifiers, $token)) {
        $all_identifiers = $all_identifiers .' '. $token;
        $total_identifiers = $total_identifiers + 1;
    } elseif (preg_match($constants, $token)) {
        $all_constants = $all_constants .' '. $token;
        $total_constants = $total_constants + 1;
    } elseif (preg_match($punctuations, $token)) {
        $all_punctuations = $all_punctuations .' '. $token;
        $total_punctuations = $total_punctuations + 1;
    } elseif (preg_match($arithmetic_operators, $token)) {
        $all_arithmetic_operators = $all_arithmetic_operators .' '. $token;
        $total_arithmetic_operators = $total_arithmetic_operators + 1;
    }
}

echo "Identifiers (".$total_identifiers.") <b>: $all_identifiers </b><br><br>";
echo "Constants (".$total_constants.") <b>: $all_constants </b><br><br>";
echo "Punctuations (".$total_punctuations.") <b>: $all_punctuations </b><br><br>";
echo "Arithmetic operators (".$total_arithmetic_operators.") <b>: $all_arithmetic_operators </b><br><br>";
echo "Keywords (".$total_keywords.") <b>: $all_keywords </b><br><br>";

?>