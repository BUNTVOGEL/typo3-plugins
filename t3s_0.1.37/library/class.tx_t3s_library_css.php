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
class tx_t3s_library_css{
	var $contentPath;
	var $filename;
	var $destinationPath;
	var $content;
	var $extKey;
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
		$this->getFileContent($this->contentPath.'/','typo3conf/ext/'.$this->extKey.'/resources/');
		$this->writeFile();
	}
    function getFileContent($absPath,$relPath){
    	$dirs = t3lib_div::get_dirs($absPath);
    	if($dirs != 'error'){
	      	foreach((array)$dirs as $folder) {
	    	    $newAbsPath = $absPath.$folder.'/';
	    	    $newRelPath = $relPath.$folder.'/';
	    		if(is_file($newAbsPath.$this->filename)){
	    			$this->content .= $this->getComment($newRelPath.$this->filename,$folder);
	    		    $this->content .= file_get_contents($newAbsPath.$this->filename);
	            }
	  		  	$this->getFileContent($newAbsPath,$newRelPath);
	  	    }
	    }
    }
    function getComment($file,$config){
    	$comment .= chr(10).'/*'.chr(10);
    	$comment .=  '##########################################################'.chr(10);
    	$comment .= '#### config: '. $config.chr(10);
    	$comment .= '#### path: '. $file.chr(10);
    	$comment .= '##########################################################'.chr(10);
    	$comment .= '*/'.chr(10);
    	return $comment;
    }
   function writeFile(){
		if($fd = fopen($this->destinationPath.'/'.$this->filename,'wb'))	{
			  fwrite( $fd,  $this->content);
			  fclose( $fd );
		}
   }
}
if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_css.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_css.php"]);
}
?>
