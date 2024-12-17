<?php
/**
 * includes/generation/generateOutput.php
 * 
 * Generates the output with previous generated contents.
 */
$output = preg_replace(
  [
    '/{LANG}/im',
    '/{OGDESCRIPTION}/im',
    '/{OGLOCALE}/im',
    '/{CONTENT}/im',
    '/{FOOTER}/im',
    '/{RELOADJS}/im',
  ],
  [
    $locale,
    $lang['og']['description'],
    $availableLocales[$locale]['ogLocale'],
    $content,
    $footer,
    ($reloadjs ? '<script type="text/javascript" src="/assets/js/reload.js"></script>' : NULL),
  ],
  $template
);
?>
