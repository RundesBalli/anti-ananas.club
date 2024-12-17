<?php
/**
 * includes/generation/generateOutput.php
 * 
 * Generates the output with previous generated contents.
 */
$randomKey = array_rand($phrases);
$output = preg_replace(
  [
    '/{CONTENT}/im',
    '/{FOOTER}/im',
    '/{RELOADJS}/im',
  ],
  [
    $content,
    $footer,
    ($reloadjs ? '<script type="text/javascript" src="/assets/js/reload.js"></script>' : NULL),
  ],
  $template
);
?>
