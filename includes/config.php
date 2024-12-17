<?php
/**
 * includes/config.php
 * 
 * Configuration file
 */

/**
 * Default locale
 * 
 * Default language pack if no locale can be detected automatically.
 * 
 * @var string
 */
$defaultLocale = 'en';

/**
 * Locale cookie name
 * 
 * @var string
 */
$cookieName['locale'] = 'locale';

/**
 * Locale list
 * 
 * @var array
 */
$availableLocales = [
  'de' => ['locale' => 'de', 'imageFile' => 'de', 'ogLocale' => 'de_DE'],
  'en' => ['locale' => 'en', 'imageFile' => 'gb', 'ogLocale' => 'en_US'],
];
?>
