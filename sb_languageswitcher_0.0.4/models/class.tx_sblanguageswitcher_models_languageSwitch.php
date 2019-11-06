<?php
tx_div::load('tx_sblanguageswitcher_models_library');
class tx_sblanguageswitcher_models_languageSwitch extends tx_sblanguageswitcher_models_library{
  var $tablesConfiguration = array();
  var $languagesConfiguration = array();
  var $paramsArray = array();

  function setTablesConfiguration($tablesConfiguration){
  	$this->tablesConfiguration = $tablesConfiguration;
  }
  function setLanguagesConfiguration($languagesConfiguration){
  	$this->languagesConfiguration = $languagesConfiguration;
  }
  function setParamsArray($paramsArray){
  	 $this->paramsArray= $paramsArray;
  }
  function load(){
  	   $this->exchangeArray( $this->makeLanguageData());
  }
  function makeLanguageData(){
  	$languageData = array();
  	$pagesLanguages = $this->getPagesLanguage($this->paramsArray['pid']);
  	$recordTableType = $this->getTableType($this->paramsArray['pid']);
  	$recordTableUid = $this->getRecordUid($recordTableType);
  	$pidExcludeList = explode(',',$this->languagesConfiguration['pidExcludeList']);
  	$isParamsArray = (boolean)count($this->paramsArray['getVar']);
  	foreach((array) $this->languagesConfiguration['values.'] as $key1 => $value1){
  	  $sysLanguage = (int)$key1;
  	  if(!($this->languagesConfiguration['showOnlyPassivLink'] && $sysLanguage===$this->paramsArray['sysLanguageUid']) && in_array($sysLanguage,$pagesLanguages)){
	      if(!in_array($this->paramsArray['pid'],$pidExcludeList)){
            $languageData[$sysLanguage]['label'] = $value1['label'];
            $languageData[$sysLanguage]['wrap'] = $value1['wrap'];
            if($isParamsArray && strlen(trim($recordTableType['recordTable']))){
	            if($this->isRecordSelectAble($recordTableType['recordTable'],$recordTableUid,$sysLanguage)){
	            	$languageData[$sysLanguage]['pid'] = $this->paramsArray['pid'];
		            $languageData[$sysLanguage]['addParams'] = $this->paramsArray['getVar'];
	            }else if($this->languagesConfiguration['contentFallBackUid']){
  			        $languageData[$sysLanguage]['pid'] = $this->languagesConfiguration['contentFallBackUid'];

              }else{
                $languageData[$sysLanguage]['label'] = '';
                $languageData[$sysLanguage]['wrap'] = '';
              }
            }else{
               $languageData[$sysLanguage]['pid'] = $this->paramsArray['pid'];
            }
  		  }else if($this->languagesConfiguration['contentFallBackUid']){
            $languageData[$sysLanguage]['label'] = $value1['label'];
            $languageData[$sysLanguage]['wrap'] = $value1['wrap'];
  			$languageData[$sysLanguage]['pid'] = $this->languagesConfiguration['contentFallBackUid'];
  		  }
  	  }
  	}
  	$out['languageData'] = $languageData;
  	$out['recordTableType'] = $recordTableType;
  	$out['noContentToValue'] = $this->languagesConfiguration['noContentToValue'];
  	$out['paramsArray'] = $this->paramsArray;
  	return $out;
  }
  function getRecordUid($recordTableType){
  	return (int)$this->paramsArray['getVar'][$recordTableType['designator']][$recordTableType['uniqueAlias']];
  }
  function getTableType($pid){
     foreach((array)$this->tablesConfiguration as $key1 => $value1){
         $valuesArray = explode(',',$value1['pid']);
         foreach((array)$valuesArray as $key2 => $value2){
           if((int)$value2 === (int)$pid){
           	 $tableType['recordTable'] = substr($key1,0,strlen($key1)-1);
           	 $tableType['designator'] = $value1['designator'];
           	 $tableType['uniqueAlias'] = $value1['uniqueAlias'];
             return $tableType;
           }
         }
     }
     return false;
  }
  function getPagesLanguage($pid){
	  $querySelection['select'] = 'sys_language_uid';
	  $querySelection['table'] = 'pages_language_overlay';
	  $querySelection['where'] = ' NOT deleted AND NOT hidden AND pid='.$pid;
	  $querySelection['groupBy'] = '';
	  $querySelection['orderBy'] = '';
	  $querySelection['limit'] = '';
	  $pagesLanguageOverlay = (array)$this->getQuerySelection($querySelection);
	  $pagesLanguage =array();
	  foreach($pagesLanguageOverlay as $key => $value){
	      $pagesLanguage[] = $value['sys_language_uid'];
    }
    $pagesLanguage[] = 0;
	  return $pagesLanguage;
  }
}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/models/class.tx_sblanguageswitcher_models_languageSwitch.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/models/class.tx_sblanguageswitcher_models_languageSwitch.php']);
}
?>
