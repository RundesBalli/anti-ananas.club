<?php
/**
 * pages/phrase.php
 * 
 * Output a random phrase from the includes/phrases.php
 */

header('Content-Type: application/json');
$randomKey = array_rand($lang['phrases']);
die(json_encode([
  'preamble' => $lang['phrases'][$randomKey][0],
  'message' => $lang['phrases'][$randomKey][1],
]));
?>
