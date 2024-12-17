<?php
/**
 * pages/changeLocale.php
 * 
 * Switch between locales.
 */
if(empty($_GET['locale'])) {
  setcookie($cookieName['locale'], $defaultLocale, time()+COOKIE_DURATION, NULL, NULL, TRUE, TRUE);
} else {
  if(preg_match('/([a-z]{2})/i', $_GET['locale'], $matchedLocale) === 1) {
    if(array_key_exists($matchedLocale[1], $availableLocales)) {
      setcookie($cookieName['locale'], $matchedLocale[1], time()+COOKIE_DURATION, NULL, NULL, TRUE, TRUE);
    } else {
      setcookie($cookieName['locale'], $defaultLocale, time()+COOKIE_DURATION, NULL, NULL, TRUE, TRUE);
    }
  } else {
    setcookie($cookieName['locale'], $defaultLocale, time()+COOKIE_DURATION, NULL, NULL, TRUE, TRUE);
  }
}
header('Location: /');
die();
?>
