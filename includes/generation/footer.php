<?php
/**
 * includes/generation/footer.php
 * 
 * Footer generation
 */
$footer =
'<span>Ein Satireprojekt von: <a href="https://RundesBalli.com/" target="_blank" rel="noopener">RundesBalli.com</a><a href="https://RundesBalli.com/imprint" target="_blank" rel="noopener">Imprint</a></span>'.
'<span><a href="https://github.com/RundesBalli/anti-ananas.club" target="_blank" rel="noopener">GitHub</a></span>'.
'<span>Fonts: <a href="https://fonts.google.com/specimen/Roboto" target="_blank" rel="noopener">Roboto</a><a href="https://www.dafont.com/de/fair-prosper.font" target="_blank" rel="noopener">Fair Prosper</a></span>'.
'<span>ketzerische Gegenbewegung: <a href="https://anti-anti-ananas.club" target="_blank" rel="noopener">anti-anti-ananas.club</a></span>';
/**
 * Locale changer
 */
$localeLinks = '';
foreach($availableLocales as $key => $val) {
  if($locale == $key) {
    /**
     * Skip current used locale
     */
    continue;
  }
  $localeLinks.= '<a href="/changeLocale?locale='.$key.'" class="linkNoUnderline"><img class="flag" title="'.(!empty($lang['footer']['locales'][$val['locale']]) ? $lang['footer']['locales'][$val['locale']] : NULL).'" src="/assets/images/flags/'.$val['imageFile'].'.svg"></a>';
}
$footer.= '<span>'.$localeLinks.'</span>';
?>
