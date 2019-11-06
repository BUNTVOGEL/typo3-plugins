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
/*
		$config['basePath'] = '/home/u0026794271/public_html/t3s/typo3conf/ext';
		$config['sourceFolder'] = '/t3s';
		$config['destFolder'] = '/t3sYaml';
		$config['searchInFile'] = 't3s';
		$config['replaceInFile'] = 't3sYaml';
		$config['excludeDir'] = array();
		$config['changeFile'] = array();
 */
class tx_t3s_library_createextension{
	var $replaceFileContent = array();
	function main($config,$replaceFileContent) {
		$this->replaceFileContent = $replaceFileContent;
		$this->dircpy($config['basePath'],
		$config['sourceFolder'],
		$config['destFolder'],
		$config['searchInFile'],
		$config['replaceInFile'],
		$config['excludeDir'],
		$config['changeFile']);
	}
	function writeFile($readPath,$writePath,$search,$replace,$changeFile,$basePath,$chmod){
	       $changeFileContent = $this->changeFileContent($changeFile,$readPath,$basePath);
	      if(strlen($changeFileContent)){
	         $content = file_get_contents($changeFileContent);
	         $content = str_replace('###'.$search.'###',$replace,$content);
	      }else{
	         $content = file_get_contents($readPath);
	         $content = str_replace($search,$replace,$content);
	      }

				if($fd = fopen($writePath,'wb'))	{
				  fwrite( $fd, $content);
				  fclose( $fd );
				   chmod($writePath,$chmod);
				}
	}
	function replaceFileContent($readPath,$basePath){
	   foreach((array)$this->replaceFileContent as  $value){
	   	 if(strpos($readPath,$value['search'])){
	   	 	return $basePath.$value['replace'];
	   	 }
	   }
	   return '';
	}
	function changeFileContent($changeFile,$readPath,$basePath){
	   foreach((array)$changeFile as $value){
	     if($basePath.$value['search']==$readPath){
	      return $basePath.$value['replace'];
	     }
	   }
	   return $this->replaceFileContent($readPath,$basePath);
	}
	function dircpy($basePath, $source, $dest,$search,$replace,$excludeDir,$changeFile,$chmod=0777, $overwrite = false){
	    if(!is_dir($basePath . $dest)) //Lets just make sure our new folder is already created. Alright so its not efficient to check each time... bite me
	    mkdir($basePath . $dest);
	    if($handle = opendir($basePath . $source)){        // if the folder exploration is sucsessful, continue
	        while(false !== ($file = readdir($handle))){ // as long as storing the next file to $file is successful, continue
	            if($file != '.' && $file != '..'){
	                $path = $source . '/' . $file;
	                if(is_file($basePath . $path)){
	                    if(!is_file($basePath . $dest . '/' . $file) || $overwrite){
	                      $fileType = substr($file,strlen($file)-4,strlen($file));
	                      if($fileType == '.txt' || $fileType == '.php'  || $fileType == '.css' || $fileType == '.sql'){
	                         $this->writeFile($basePath . $path, $basePath . $dest . '/' . $file,$search,$replace,$changeFile,$basePath,$chmod);
	                      }else if(!@copy($basePath . $path, $basePath . $dest . '/' . $file)){
	                          echo '<font color="red">File ('.$path.') could not be copied, likely a permissions problem.</font>';
	                      }
	                      chmod($basePath . $dest . '/' . $file,$chmod);
	                    }
	                } elseif(is_dir($basePath . $path) && !in_array($path,$excludeDir)){
	                    if(!is_dir($basePath . $dest . '/' . $file))
	                    mkdir($basePath . $dest . '/' . $file); // make subdirectory before subdirectory is copied
	                    chmod($basePath . $dest . '/' . $file,$chmod);
	                    $this->dircpy($basePath, $path, $dest . '/' . $file,$search,$replace,$excludeDir,$changeFile,$chmod, $overwrite); //recurse!
	                }
	            }
	        }
	        closedir($handle);
	    }
	}
}
if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_createextension.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_createextension.php"]);
}
?>
