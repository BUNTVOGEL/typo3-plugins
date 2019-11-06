<?php
tx_div::load('tx_sblanguageswitcher_controllers_library');
class tx_sblanguageswitcher_controllers_languageSwitch extends tx_sblanguageswitcher_controllers_library{
   var $paramsArray = array();
   function init(){
   	 $this->paramsArray['sysLanguageUid'] = (int)$GLOBALS['TSFE']->sys_language_uid;
   	 $this->paramsArray['pid'] = (int)$GLOBALS['TSFE']->id;
   	 $this->paramsArray['getVar'] = $_GET;
   }
	function languageSwitchAction(){
		$this->init();
		 return $this->view();
  }
    function model(){
    	$model = tx_div::makeInstance('tx_sblanguageswitcher_models_languageSwitch');
    	$this->paramsArray['getVar'] = $this->validate();
    	$model->setParamsArray($this->paramsArray);
    	$model->setTablesConfiguration( $this->configurations->get('recordTables.'));
    	$model->setLanguagesConfiguration( $this->configurations->get('languages.'));
		$model->load();
		return $model;
    }
    function validate(){
  		$validate = tx_div::makeInstance('tx_sblanguageswitcher_validate_languageSwitch');
  		return $validate->load($this->paramsArray['getVar'], $this->configurations->get('validate.'));
    }
    function view(){
  		$className = tx_div::makeInstanceClassName('tx_sblanguageswitcher_views_languageSwitch');
  		$view = new $className($this,$this->model());
  		$templatePath =   $this->configurations->get('templatePath');
  		$templateFile =  $this->configurations->get('template');
  		$view->setPathToTemplateDirectory($templatePath);
  		return $view->render($templateFile);
    }

}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/controllers/class.tx_sblanguageswitcher_controllers_languageSwitch.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/sb_languageswitcher/controllers/class.tx_sblanguageswitcher_controllers_languageSwitch.php']);
}
?>
