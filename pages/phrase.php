<?php
/**
 * pages/phrase.php
 * 
 * Output a random phrase from the includes/phrases.php
 */

header('Content-Type: application/json');
$randomKey = array_rand($phrases);
die(json_encode([
  'preamble' => $phrases[$randomKey][0],
  'message' => $phrases[$randomKey][1],
]));
?>
