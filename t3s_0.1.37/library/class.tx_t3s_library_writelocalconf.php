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
require_once (PATH_t3lib.'class.t3lib_install.php');
require_once(t3lib_extMgm::extPath('install').'mod/class.tx_install.php');
class tx_t3s_library_writelocalconf{
	function main($localconfExtensions,$t3sCreateExtension,$t3ssetup){
		$this->writeLocalconf($localconfExtensions,$t3sCreateExtension,$t3ssetup);
	}
	function writeNewExtensionList($addExtList,$t3sCreateExtension,$writeLines = array())	{
		global $TYPO3_CONF_VARS;
		if(isset($TYPO3_CONF_VARS['EXT']['extListT3Sugar'])){
            $newExtList = $TYPO3_CONF_VARS['EXT']['extListT3Sugar'].','.$addExtList;
		}else{
			$newExtList = $TYPO3_CONF_VARS['EXT']['extList'].','.$addExtList;
		}
		// Instance of install tool
		$instObj =t3lib_div::makeInstance('t3lib_install');
		$instObj->allowUpdateLocalConf =1;
		$instObj->updateIdentity = 'TYPO3 Extension Manager';

		// Get lines from localconf file
		$lines = $instObj->writeToLocalconf_control();
		$instObj->setValueInLocalconfFile($lines, '$TYPO3_CONF_VARS[\'EXT\'][\'extList\']', $newExtList);
		if(!isset($TYPO3_CONF_VARS['EXT']['extListT3Sugar'])){
            $instObj->setValueInLocalconfFile($lines, '$TYPO3_CONF_VARS[\'EXT\'][\'extListT3Sugar\']', $TYPO3_CONF_VARS['EXT']['extList']);
		}
		$countCE = strlen($t3sCreateExtension);
		$ceLine = 'a:1:{s:3:"ext";s:'.$countCE.':"'.$t3sCreateExtension.'";}';
        $instObj->setValueInLocalconfFile($lines, '$TYPO3_CONF_VARS[\'EXT\'][\'extConf\'][\'t3seditor\']', $ceLine);
		foreach((array)$writeLines as $value){
			$instObj->setValueInLocalconfFile($lines,$value['array'], $value['value']);
		}
		$instObj->writeToLocalconf_control($lines);

		$TYPO3_CONF_VARS['EXT']['extList'] = $newExtList;
		$this->removeCacheFiles();
	}
	function removeCacheFiles()	{
		return t3lib_extMgm::removeCacheFiles();
	}
	function writeLocalconf($localconfExtensions,$t3sCreateExtension,$t3ssetup){
        $path = PATH_site.'typo3conf/ext/'.$t3ssetup.'/t3sinstalltool/write_localconf.php';
		if(file_exists($path)){
		     require_once($path);
             $this->writeNewExtensionList((string)$localconfExtensions,$t3sCreateExtension,(array)$writeLocalconf);
		}
	}
	function xt3sFindInstallPackage(){
	   $path = PATH_site.'typo3conf/ext';
	   $dirs = t3lib_div::get_dirs($path);
	   foreach($dirs as $dir){
	   	   $installPackagePath = $path.'/'.$dir.'/t3sinstalltool/';
	   	  if (is_dir($installPackagePath) && $dir!='t3s'){
	   	  	  return $dir;
	   	  }
	   }
	}
}
if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_writelocalconf.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_writelocalconf.php"]);
}
?>