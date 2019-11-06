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
class tx_t3s_library_warningnormal{
	var $t3sInstallWarning;
	var $noWarning = true;
	function main(){
         $this->isIMGrafixInstalled();
         #$this->isApacheModRewrite();
         $this->isOnlyT3S();
     }
	function getInstallWarnings(){
		return $this->t3sInstallWarning;
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
		function isOnlyT3S(){
		   $path = PATH_site.'typo3conf/ext';
		   $dirs = t3lib_div::get_dirs($path);
            if(count($dirs)>1 && $dirs[0] != 't3s'){
				$this->t3sInstallWarning[] = 'isOnlyT3S';
				$this->noWarning = false;
            }
		}
}
if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_warningnormal.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_warningnormal.php"]);
}
?>
