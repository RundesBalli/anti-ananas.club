<?php
/**
 * includes/generation/footer.php
 * 
 * Footer generation
 */
$footer =
'<span>'.$lang['footer']['satire'].': <a href="https://RundesBalli.com/" target="_blank" rel="noopener">RundesBalli.com</a><a href="https://RundesBalli.com/imprint" target="_blank" rel="noopener">'.$lang['footer']['imprint'].'</a></span>'.
'<span><a href="https://github.com/RundesBalli/anti-ananas.club" target="_blank" rel="noopener">GitHub</a><a href="/info">'.$lang['footer']['info'].'</a></span>'.
'<span>'.$lang['footer']['antiAnti'].': <a href="https://anti-anti-ananas.club" target="_blank" rel="noopener">anti-anti-ananas.club</a></span>';

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
