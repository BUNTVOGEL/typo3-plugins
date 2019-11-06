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
class tx_t3s_library_dircpy{
	function main($basePath, $source, $dest){
		$this->dircpy($basePath, $source,$dest); //recurse!
	}
	function dircpy($basePath, $source, $dest, $overwrite = false){
	    if(!is_dir($basePath . $dest)) //Lets just make sure our new folder is already created. Alright so its not efficient to check each time... bite me
	    mkdir($basePath . $dest);
	    if($handle = opendir($basePath . $source)){        // if the folder exploration is sucsessful, continue
	        while(false !== ($file = readdir($handle))){ // as long as storing the next file to $file is successful, continue
	            if($file != '.' && $file != '..'){
	                $path = $source . '/' . $file;
	                if(is_file($basePath . $path)){
	                    if(!is_file($basePath . $dest . '/' . $file) || $overwrite)
	                    if(!@copy($basePath . $path, $basePath . $dest . '/' . $file)){
	                        echo '<font color="red">File ('.$path.') could not be copied, likely a permissions problem.</font>';
	                    }
	                } elseif(is_dir($basePath . $path)){
	                    if(!is_dir($basePath . $dest . '/' . $file))
	                    mkdir($basePath . $dest . '/' . $file); // make subdirectory before subdirectory is copied
	                    $this->dircpy($basePath, $path, $dest . '/' . $file, $overwrite); //recurse!
	                }
	            }
	        }
	        closedir($handle);
	    }
	}
}
if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_dircpy.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_dircpy.php"]);
}
?>