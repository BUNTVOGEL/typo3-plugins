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
require_once(t3lib_extMgm::extPath('t3s').'library/class.tx_t3s_library_terimport.php');
class tx_t3s_library_installpackage{
	var $installPackageName = 't3sinstallfiles';
	function main($path){
	   $dirs = t3lib_div::get_dirs($path);
	   foreach($dirs as $dir){
	   	   $installPackagePath = $path.'/'.$dir.'/'.$this->installPackageName.'/';
	   	  if (@is_dir($installPackagePath)){
	   	  	  return $dir;
	   	  }
	   }
	   return false;
	}
}
if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_installpackage.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_installpackage.php"]);
}

?>