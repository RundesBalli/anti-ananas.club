<?php
/**
 * includes/generation/locale.php
 * 
 * Use the selected locale or the locale selected as default.
 */
if(empty($_COOKIE[$cookieName['locale']])) {
  if(!empty($_SERVER['HTTP_ACCEPT_LANGUAGE']) AND preg_match('/([a-z]{2})/i', (substr($_SERVER['HTTP_ACCEPT_LANGUAGE'], 0, 2) ?: $defaultLocale), $matchedLocale) === 1) {
    if(array_key_exists($matchedLocale[1], $availableLocales)) {
      $locale = $matchedLocale[1];
    } else {
      $locale = $defaultLocale;
    }
  } else {
    $locale = $defaultLocale;
  }
} else {
  if(preg_match('/([a-z]{2})/i', $_COOKIE[$cookieName['locale']], $matchedLocale) === 1) {
    if(array_key_exists($matchedLocale[1], $availableLocales)) {
      $locale = $matchedLocale[1];
    } else {
      $locale = $defaultLocale;
    }
  } else {
    $locale = $defaultLocale;
  }
}
?>
