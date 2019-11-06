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
class tx_t3s_library_cssimport{
	var $contentPath;
	var $filename;
	var $destinationPath;
	var $content;
	var $extKey;
	var $includeName = 'include_';
	function setContentPath($contentPath){
		 $this->contentPath = $contentPath;
	}
	function setFilename($filename){
		$this->filename = $filename;
	}
	function setDestinationPath($destinationPath){
		$this->destinationPath = $destinationPath;
	}
	function setExtKey($extKey){
		$this->extKey = $extKey;
	}
	function main(){
		$this->findImportCSSFile('',$this->contentPath.'/','typo3conf/ext/'.$this->extKey.'/resources/');
		$this->getFileContent($this->contentPath.'/','typo3conf/ext/'.$this->extKey.'/resources/');
	}
    function getFileContent($absPath,$relPath){
    	$dirs = t3lib_div::get_dirs($absPath);
    	if($dirs != 'error'){
	      	foreach((array)$dirs as $folder) {
	    	    $newAbsPath = $absPath.$folder.'/';
	    	    $newRelPath = $relPath.$folder.'/';
				$this->findImportCSSFile($folder,$newAbsPath,$newRelPath);
	  		  	$this->getFileContent($newAbsPath,$newRelPath);
	  	    }
	    }
    }
    function findImportCSSFile($folder,$newAbsPath,$newRelPath){
	    	    $filesInDir = t3lib_div::getFilesInDir($newAbsPath);
	    		if(is_array($filesInDir)){
                    foreach($filesInDir as $file){
                        if(substr($file,0,strlen($this->includeName))==$this->includeName && substr($file,strrpos($file,'.')+1,strlen($file)-1)=='css'){
                        	$writeFileTemp = substr($file,strlen($this->includeName),strlen($file));
                            $this->writeImportCSSFile($newAbsPath,$newRelPath,$folder,$newAbsPath.$file,$writeFileTemp);
                        }
                    }
	            }
    }
    function writeImportCSSFile($newAbsPath,$newRelPath,$folder,$importFile,$writeFileTemp){
    	  $content = '';
          $files = explode(';',(string)file_get_contents($importFile));
          foreach((array)$files as $file){
          	  if(!(substr(trim($file),0,1)=='#')){
	          	  $file = trim(str_replace(')','',substr($file,strpos($file,'(')+1,strlen($file))));
	          	  if(strlen($file)){
	          	  	     if(is_file($newAbsPath.$file)){
	          	  	     	$fc = file_get_contents($newAbsPath.$file);
	          	  	     	if(strlen(trim($fc))){
	          	  	     		if(!is_file($newAbsPath.'NO_PATH_INFO')OR is_file($newAbsPath.'COMPRESS_CSS')){
			    			 	   $content .= $this->getComment($newRelPath.$file,$folder);
	          	  	     		}
			    		        $content .= $fc.chr(10);
	          	  	     	}
	          	  	     }
	          	  }
              }
          }
          if(is_file($newAbsPath.'COMPRESS_CSS')){
          	$content = $this->compress($content);
          }
         #if(strlen(trim($content))){
			$this->writeFile($content,$writeFileTemp);
         #}
    }
   function compress($compressCode) {
			$compressCode = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $compressCode);
			$compressCode = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $compressCode);
			$compressCode = str_replace('{ ', '{', $compressCode);
			$compressCode = str_replace(' }', '}', $compressCode);
			$compressCode = str_replace('; ', ';', $compressCode);
			return $compressCode;
   }
    function getComment($file,$config){
    	$comment .= '/*'.chr(10);
    	$comment .=  '##########################################################'.chr(10);
    	$comment .= '#### path: '. $file.chr(10);
    	$comment .= '##########################################################'.chr(10);
    	$comment .= '*/'.chr(10);
    	return $comment;
    }
   function writeFile($content,$writeFileTemp){
		if($fd = fopen($this->destinationPath.'/'.$writeFileTemp,'wb'))	{
			  fwrite( $fd,  $content);
			  fclose( $fd );
		}
   }
}
if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_cssimport.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_cssimport.php"]);
}
?>