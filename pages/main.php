<?php
/**
 * pages/main.php
 * 
 * The home page with the phrases.
 */

/**
 * Tell the page generation to load the reload.js
 */
$reloadjs = TRUE;

/**
 * Select random phrase key
 */
$randomKey = array_rand($lang['phrases']);

$content.= '<div id="preamble">'.$lang['phrases'][$randomKey][0].'</div>';
$content.= '<div id="message">'.$lang['phrases'][$randomKey][1].'</div>';
$content.= '<div id="progress"><div id="bar"></div></div>';
$content.= '<a id="reload">↻ reload</a>';
?>
