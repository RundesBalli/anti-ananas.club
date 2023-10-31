<?php
/**
 * includes/generation/generateOutput.php
 * 
 * Generates the output with previous generated contents.
 */
$output = preg_replace(
  array(
    '/{PREAMBLE}/im',
    '/{MESSAGE}/im',
    '/{FOOTER}/im'
  ),
  array(
    $randomPhrase['preamble'],
    $randomPhrase['message'],
    $footer,
  ),
  $template,
);
?>
