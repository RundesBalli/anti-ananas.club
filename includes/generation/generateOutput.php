<?php
/**
 * includes/generation/generateOutput.php
 * 
 * Generates the output with previous generated contents.
 */
$randomKey = array_rand($phrases);
$output = preg_replace(
  [
    '/{PREAMBLE}/im',
    '/{MESSAGE}/im',
    '/{FOOTER}/im',
  ],
  [
    $phrases[$randomKey][0],
    $phrases[$randomKey][1],
    $footer,
  ],
  $template
);
?>
