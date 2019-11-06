<?php
tx_div::load('tx_sblanguageswitcher_views_library');
class tx_sblanguageswitcher_views_languageSwitch extends tx_sblanguageswitcher_views_library{
    function makeLanguageLink($designator,$parameters,$pid,$text,$parametersSpecial){
		$link = tx_div::makeInstance('tx_sblanguageswitcher_library_link');
		$link->designator($designator);
		$link->destination($pid);
		$link->parameters($parameters);
		$link->parametersSpecial($parametersSpecial);
		$link->label($text);
        return  $link->makeTag();
    }
    function makeLanguageSwitcher(){
    	$this->languageArray = $this->getLanguageArray();
    	$languageConf = $this->controller->configurations->get('languages.');
    	$out = '';
    	$designator = $this->languageArray['recordTableType']['designator'];
    	foreach((array)$this->languageArray['languageData'] as $key1 => $values){
    		$parametersSpecial['L'] = $key1;
    		  $label = $values['label'];

    	 if(!($languageConf['disableAktivLink'] && (int)$key1===(int)$this->languageArray['paramsArray']['sysLanguageUid'])){
      	    if(count($values['addParams'])){
               $parameters  = $values['addParams'][$designator];
      	      $label = $this->makeLanguageLink($designator,$parameters,$values['pid'],$label,$parametersSpecial);
      	    }else{
      	      $label = $this->makeLanguageLink($designator,array(),$values['pid'],$label,$parametersSpecial);
            }
          }
          if((int)$_GET['L']!==(int)$this->languageArray['paramsArray']['sysLanguageUid']  && (int)$key1===(int)$this->languageArray['paramsArray']['sysLanguageUid']){
          	$out .= $this->wrap($label,(string)$this->languageArray['noContentToValue']);
          }else{
          	$out .= $this->wrap($label,(string)$values['wrap']);
          }

    	}
    	return $this->wrap($out,(string)$languageConf['wrapAll']);
    }
	function getLanguageArray(){
		return (array)$this->getHashArray();
	}
	function wrap($label,$wrap){
       if(strlen(trim($wrap))&&strlen(trim($label))){
        $wa = explode('|',$wrap);
       	return $wa[0].$label.$wa[1];
       }
       return $label;
	}
}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/views/class.tx_sblanguageswitcher_views_languageSwitch.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/views/class.tx_sblanguageswitcher_views_languageSwitch.php']);
}
?>
