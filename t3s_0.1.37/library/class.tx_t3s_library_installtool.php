<?php
/***************************************************************
*  Copyright notice
*
*  (c) 2007 Micha Barthel (infoa@t3sugar.info)
*  All rights reserved
*
*  This script is part of the TYPO3 project. The TYPO3 project is
*  free software; you can redistribute it and/or modify
*  it under the terms of the GNU General Public License as published by
*  the Free Software Foundation; either version 2 of the License, or
*  (at your option) any later version.
*
*  The GNU General Public License can be found at
*  http://www.gnu.org/copyleft/gpl.html.
*
*  This script is distributed in the hope that it will be useful,
*  but WITHOUT ANY WARRANTY; without even the implied warranty of
*  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
*  GNU General Public License for more details.
*
*  This copyright notice MUST APPEAR in all copies of the script!
***************************************************************/
require_once(PATH_t3lib.'class.t3lib_scbase.php');
require_once(t3lib_extMgm::extPath('t3s').'library/class.tx_t3s_library_installpackage.php');
require_once(t3lib_extMgm::extPath('t3s').'library/class.tx_t3s_library_terimport.php');
require_once(t3lib_extMgm::extPath('t3s').'library/class.tx_t3s_library_warningfatal.php');
require_once(t3lib_extMgm::extPath('t3s').'library/class.tx_t3s_library_warningnormal.php');
class tx_t3s_library_installtool extends t3lib_SCbase{
		var $pageinfo;
		var $fetchMetaData;
		var $installWarningsFatal;
		var $installWarningsNormal;
		function init()	{
			global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;
			parent::init();
		}
		function printContent()	{
			$this->content.=$this->doc->endPage();
			echo $this->content;
		}
		function t3sFindInstallPackage(){
		   $path = PATH_site.'typo3conf/ext';
		   $dirs = t3lib_div::get_dirs($path);
		   foreach($dirs as $dir){
		   	   $installPackagePath = $path.'/'.$dir.'/t3sinstalltool/';
			  if (is_dir($installPackagePath) && $dir!='t3s'){
			   	  	  $T3Sdirs[] = $dir;
			  }
		   }
		   return $T3Sdirs;
		}
		function t3sTerImport($t3sExtensions){
			$SOBE = t3lib_div::makeInstance('tx_t3s_library_terimport');
			$SOBE->init();
			foreach($SOBE->include_once as $INC_FILE) {
				include_once($INC_FILE);
			}
			$SOBE->checkExtObj();
			$SOBE->main($t3sExtensions);
			$this->fetchMetaData = $SOBE->fetchMetaData('extensions');

		}
		function t3sTerXMLList(){
			$SOBE = t3lib_div::makeInstance('tx_t3s_library_terimport');
			$SOBE->init();
			foreach($SOBE->include_once as $INC_FILE) {
				include_once($INC_FILE);
			}
			$SOBE->checkExtObj();
			$SOBE->initMain();
			$this->fetchMetaData =  $SOBE->fetchMetaData('extensions');
		}
		function t3sInstallToolWarningFatal(){
			$SOBE = t3lib_div::makeInstance('tx_t3s_library_warningfatal');
			$SOBE->main();
			$this->installWarningsFatal = $SOBE->getInstallWarnings();
			return $SOBE->isInstallWarning();
		}
		function t3sInstallToolWarningNormal(){
			$SOBE = t3lib_div::makeInstance('tx_t3s_library_warningnormal');
			$SOBE->main();
			$this->installWarningsNormal = $SOBE->getInstallWarnings();
		}
		function makeInstallWarningList($prefix,$warnings){
			global $LANG;
			$html = '';
			if(is_array($warnings)){
			$color = 'green';
	        if($prefix =='ERROR'){
            	$color = 'red';
            }
			foreach((array)$warnings as $value){
				 $html .= '<li style="color: red; font-weight: bold;">'.$prefix.': <span style="color: '.$color.'">'.$LANG->getLL($value).'</span></li>';
			}
			$ew =  '<div style="font-weight: bold; display:inline; "><span style="color: red">Explain WARNING</span>: You can install the Distribution, but the Typo3-Server-Environment is not optimal configurated! </br><a style="text-decoration: underline;"  href="http://www.t3sugar.info/de/documentation/warning/">See info on T3Sugar</a></div>';
			$e = '<div style="font-weight: bold; display:inline;  "><span style="color: red">Explain ERROR</span>: You can not install the Distribution, because the Typo3-Server-Environment is not optimal configurated!  </br><a style="text-decoration: underline;" href="http://www.t3sugar.info/de/documentation/error/">See info on T3Sugar</a></div>';
            if($prefix =='ERROR'){
            	$ew = $e;
            }
            return '<table style="border: 1px solid gray; padding: 5px; width: 100%;" border="0" cellpadding="0" cellspacing="0"><tbody><tr><td>'.$ew.'<br><ul>'.$html.' </ul></td></tr></tbody></table>';
			}
			return '';
		}
}
if (defined('TYPO3_MODE') && $TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3s/library/class.tx_t3s_library_installtool.php'])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]['XCLASS']['ext/t3s/library/class.tx_t3s_library_installtool.php']);
}

?>
