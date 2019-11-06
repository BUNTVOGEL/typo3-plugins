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
class tx_t3s_library_warningfatal{
	var $t3sInstallWarning;
	var $noWarning = true;
	function main(){
         $this->isENABLE_T3S_INSTALL_TOOL();
         $this->isTypo3ConfWriteable();
         $this->isTypo3ConfExtWriteable();
         $this->isTempWriteable();
         $this->isFileadminWriteable();
         #$this->isApacheModRewrite();
         $this->isExtensionXMLList();
     }
	function isInstallWarning(){
		return $this->noWarning;
	}
	function getInstallWarnings(){
		return $this->t3sInstallWarning;
	}
	function isENABLE_T3S_INSTALL_TOOL(){
		if(is_file(PATH_site.'typo3conf/DISABLE_T3S_INSTALL_TOOL')){
			$this->t3sInstallWarning[] = 'ENABLE_T3S_INSTALL_TOOL';
			$this->noWarning = false;
		}
	}
	function isApacheModRewrite(){
		if(function_exists('apache_get_modules')){
			$agm = @apache_get_modules();
			if(!in_array('mod_rewrite',$agm)){
				$this->t3sInstallWarning[] = 'ApacheModRewrite';
				$this->noWarning = false;
			}
		}else{
			 ob_start();
			 phpinfo();
			 $s = ob_get_contents();
			 ob_end_clean();
			if(!strstr($s,'mod_rewrite')){
				$this->t3sInstallWarning[] = 'ApacheModRewrite';
				$this->noWarning = false;
			}
		}
	}
	function isIMGrafixInstalled(){
		global $TYPO3_CONF_VARS;
		$newFile = PATH_site.'typo3temp/'.date("YmdHis").'.jpg';
		$File = PATH_site.'typo3conf/ext/t3s/mod1/alt_backend_logo.jpg[0]';
		$command = $TYPO3_CONF_VARS['GFX']['im_path'].'convert -geometry 160x120! -quality 90 '.$File.' '.$newFile;
        $execreturn= exec($command);
		if(!is_file($newFile)){
			$this->t3sInstallWarning[] = 'IMGrafixInstalled';
			$this->noWarning = false;
		}
	}
	function isExtensionXMLList(){
		if(!is_file(PATH_site.'typo3temp/extensions.xml.gz')){
			$this->t3sInstallWarning[] = 'ExtensionXMLList';
			$this->noWarning = false;
		}
	}
	function isTypo3ConfWriteable(){
		if(!is_writable (PATH_site.'typo3conf/')){
			$this->t3sInstallWarning[] = 'Typo3ConfWriteable';
			$this->noWarning = false;
		}
	}
	function isTypo3ConfExtWriteable(){
		if(!is_writable (PATH_site.'typo3conf/ext/')){
			$this->t3sInstallWarning[] = 'Typo3ConfExtWriteable';
			$this->noWarning = false;
		}
	}
	function isTempWriteable(){
		if(!is_writable (PATH_site.'typo3temp/')){
			$this->t3sInstallWarning[] = 'TempWriteable';
			$this->noWarning = false;
		}
	}
	function isFileadminWriteable(){
		if(!is_writable (PATH_site.'fileadmin/')){
			$this->t3sInstallWarning[] = 'FileadminWriteable';
			$this->noWarning = false;
		}
	}
}
if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_warningfatal.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_warningfatal.php"]);
}
?>
