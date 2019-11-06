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

class tx_t3s_library_configuration{
    function addTypoScriptDir($absPath,$relPath,$_EXTKEY,$namePath){
    	$dirs = t3lib_div::get_dirs($absPath);
    	if($dirs != 'error'){
      	foreach((array)$dirs as $value) {
  	        $newAbsPath = $absPath.$value.'/';
  	        $newRealPath = $relPath.$value.'/';
  	        $newNamePath = $namePath.$value.'/';
  			$files = t3lib_div::getFilesInDir($newAbsPath);
  			if(in_array('constants.txt',$files) && in_array('setup.txt',$files) && !in_array('.noStaticTemplate',$files)){
        	t3lib_extMgm::addStaticFile($_EXTKEY, $newRealPath, $newNamePath);
  			}
  		  	tx_t3s_library_configuration::addTypoScriptDir($newAbsPath,$newRealPath,$_EXTKEY,$newNamePath);
  	    }
	    }
    }
    function addTSpageDir($absPath,$relPath,$_EXTKEY){
    	$dirs = t3lib_div::get_dirs($absPath);
    	if($dirs != 'error'){
      	foreach((array)$dirs as $value) {
    	    $newAbsPath = $absPath.$value.'/';
    	    $newRealPath = $relPath.$value.'/';
    			$files = t3lib_div::getFilesInDir($newAbsPath);
    			if(in_array('config.txt',$files)){
    				t3lib_extMgm::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/configuration/TSpage/'.$newRealPath.'config.txt">');
          }
  		  	tx_t3s_library_configuration::addTSpageDir($newAbsPath,$newRealPath,$_EXTKEY);
  	    }
	    }
    }
    function addTSuserDir($absPath,$relPath,$_EXTKEY){
    	$dirs = t3lib_div::get_dirs($absPath);
    	if($dirs != 'error'){
      	foreach((array)$dirs as $value) {
    	    $newAbsPath = $absPath.$value.'/';
    	    $newRealPath = $relPath.$value.'/';
    			$files = t3lib_div::getFilesInDir($newAbsPath);
    			if(in_array('config.txt',$files)){
    				t3lib_extMgm::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/configuration/TSuser/'.$newRealPath.'config.txt">');
          }
  		  	tx_t3s_library_configuration::addTSuserDir($newAbsPath,$newRealPath,$_EXTKEY);
  	    }
	    }
    }
    function addLocalconfDir($absPath,&$pathArray){
    	$dirs = t3lib_div::get_dirs($absPath);
    	if($dirs != 'error'){
      	foreach((array)$dirs as $value) {
  	      $newAbsPath = $absPath.$value.'/';
  			 $files = t3lib_div::getFilesInDir($newAbsPath);
    			 if(in_array('localconf.php',$files)){
    				 $pathArray[] = $newAbsPath.'localconf.php';
    			 }
  		  	tx_t3s_library_configuration::addLocalconfDir($newAbsPath,$pathArray);
  	    }
	    }
    }
   function writeFile($absPath,$file,$content){
			if($fd = fopen($absPath.$file,'wb'))	{
			  fwrite( $fd, $content);
			  fclose( $fd );
			}
   }
   function getTypoScriptIncludes($absPath,$includeTSconfigPath){
   	  $includeTSconfig = array();
   	  if(is_file($absPath.'configlibrary/ts/include.txt')){
        $includeTS = (array)explode(',',file_get_contents($absPath.'configlibrary/ts/include.txt'));
        foreach($includeTS as $ts){
        	$ts = trim($ts);
        	if(strlen($ts)&&$ts!=','){
        		$includeTSconfig[] = "configlibrary/ts/".$ts;
        	}
        }
   	  }else{
   	  	require_once($absPath.$includeTSconfigPath);
   	  }
   	  return $includeTSconfig;
   }
   function writeTempTS($absPath,$includeTSconfigPath,$tempTSPath,$addSetup,$addConstants){
     $includeTSconfig = tx_t3s_library_configuration::getTypoScriptIncludes($absPath,$includeTSconfigPath);
     foreach((array)$includeTSconfig as $value){
     	if(is_file($absPath.$value.'setup.txt')&&is_file($absPath.$value.'constants.txt')){
       $setup .= tx_t3s_library_configuration::getComment($absPath.$value.'setup.txt',$value).file_get_contents($absPath.$value.'setup.txt');
       $constants .= tx_t3s_library_configuration::getComment($absPath.$value.'constants.txt',$value).file_get_contents($absPath.$value.'constants.txt');
     	}
     }
     $setup .= $addSetup;
     $constants .= $addConstants;
     tx_t3s_library_configuration::writeFile($absPath.$tempTSPath,'setup.txt',$setup);
     tx_t3s_library_configuration::writeFile($absPath.$tempTSPath,'constants.txt',$constants);
   }
    function getComment($file,$config){
    	$comment .= chr(10).'##########################################################################################'.chr(10);
    	$comment .= '#### config: '. $config.chr(10);
    	$comment .= '#### path: '. $file.chr(10);
    	$comment .= '##########################################################################################'.chr(10);
    	return $comment;
    }
}
if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_configuration.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_configuration.php"]);
}
?>
