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
require_once(t3lib_extMgm::extPath('t3s').'library/class.tx_t3s_library_createextension.php');
require_once(t3lib_extMgm::extPath('t3s').'library/class.tx_t3s_library_dircpy.php');
require_once(t3lib_extMgm::extPath('t3s').'library/class.tx_t3s_library_writelocalconf.php');
require_once(t3lib_extMgm::extPath('t3s').'library/class.tx_t3s_library_warningfatal.php');
class tx_t3s_library_ajaxresponse{
	function t3sInstallToolWarning(){
			$SOBE = t3lib_div::makeInstance('tx_t3s_library_warningfatal');
			$SOBE->main();
			return $SOBE->isInstallWarning();
	}
	function main(){
		$noWarning = $this->t3sInstallToolWarning();
        if(!@is_dir(PATH_site.'typo3conf/ext/'.trim($_POST['t3ssetup']).'/t3sinstalltool')){
            $noWarning = false;
        }
        if(isset($_POST['t3sTerimport']) && $noWarning  ){
        	$this->t3sTerimport();
        }else if(isset($_POST['t3sSql']) && $noWarning ){
        	$this->t3sSQL();
        }else  if(isset($_POST['t3sCreateExtension']) && $noWarning ){
        	$this->t3sCreateExtension();
        } else  if(isset($_POST['t3sWriteFileadmin']) && $noWarning){
        	$this->t3sWriteFileadmin();
        } else  if(isset($_POST['t3sWriteTypo3Temp']) && $noWarning){
        	$this->t3sWriteTypo3Temp();
		} else  if(isset($_POST['t3sWriteTypo3Upload']) && $noWarning){
        	$this->t3sWriteTypo3Upload();
        } else  if(isset($_POST['t3sWriteTypo3Conf']) && $noWarning){
        	$this->t3sWriteTypo3Conf();
        }else  if(isset($_POST['t3sHtaccess']) && $noWarning ){
        	$this->t3sHtaccess();
        } else  if(isset($_POST['t3sWriteLocalconf']) && $noWarning){
        	$this->t3sWriteLocalconf();
        } else  if(isset($_POST['t3sForceDBupdates']) && $noWarning){
        	$this->t3sForceDBupdates();
        }else  if(isset($_POST['t3sUnableInstallTool']) && $noWarning ){
        	$this->t3sDISABLE_T3S_INSTALL_TOOL();
        }else  if(isset($_POST['t3sT3XFiles']) && $noWarning ){
        	$this->t3sT3XFiles();
        }else{
       	    $this->locked();
        }
	}
    function t3sT3XFiles(){
    	$path = PATH_site.'typo3conf/ext/'.trim($_POST['t3ssetup']).'/t3sinstalltool/t3x';
    	$files = t3lib_div::getFilesInDir($path);
		if(is_array($files)){
			foreach($files as $value){
				$SOBE = t3lib_div::makeInstance('tx_t3s_library_terimport');
				$SOBE->init();
				foreach($SOBE->include_once as $INC_FILE) {
					include_once($INC_FILE);
				}
				$SOBE->checkExtObj();
				$SOBE->initMain();
				$SOBE->writeT3XFileToTypo3Conf($path.'/'.$value);
			}
            $statusListText = '<div style="color:green;font-weight: bold;">T3X-Files are written!!!</div>Server-Folder: '.$path;
		}else{
	        $statusListText = '<div style="color:green;font-weight: bold;">No T3X-Files found !!!</div>Server-Folder: '.$path;
	        $action = 'true';
		}
       $this->outputXMLreply($statusListText,$action,'t3sT3XFiles',trim($_POST['t3sT3XFiles']));
    }
	function t3sWriteTypo3Upload(){
       	    $source = 'typo3conf/ext/'.trim($_POST['t3ssetup']).'/t3sinstalltool/upload';
       	    $dest = 'upload';
       	    if(is_dir(PATH_site.$source)){
	       	 	$t3s_packeges = t3lib_div::makeInstance('tx_t3s_library_dircpy');
				$t3s_packeges->main(PATH_site,$source,$dest);
       	    }
			$statusListText = '<div style="color:green; font-weight: bold;">Typo3Upload is written......</div>Server-Folder: '.PATH_site.'typo3upload/';
			$this->outputXMLreply($statusListText,'true','t3sWriteTypo3Upload',trim($_POST['t3sWriteTypo3Upload']));
	}
	function t3sWriteTypo3Conf(){
       	    $source = 'typo3conf/ext/'.trim($_POST['t3ssetup']).'/t3sinstalltool/typo3conf';
       	    $dest = 'typo3conf';
       	    if(is_dir(PATH_site.$source)){
	       	 	$t3s_packeges = t3lib_div::makeInstance('tx_t3s_library_dircpy');
				$t3s_packeges->main(PATH_site,$source,$dest);
       	    }
			$statusListText = '<div style="color:green; font-weight: bold;">Typo3conf is written......</div>Server-Folder: '.PATH_site.'typo3conf/';
			$this->outputXMLreply($statusListText,'true','t3sWriteTypo3Conf',trim($_POST['t3sWriteTypo3Conf']));
	}
	function t3sWriteTypo3Temp(){
       	    $source = 'typo3conf/ext/'.trim($_POST['t3ssetup']).'/t3sinstalltool/typo3temp';
       	    $dest = 'typo3temp';
       	    if(is_dir(PATH_site.$source)){
	       	 	$t3s_packeges = t3lib_div::makeInstance('tx_t3s_library_dircpy');
				$t3s_packeges->main(PATH_site,$source,$dest);
       	    }
			$statusListText = '<div style="color:green; font-weight: bold;">Typo3temp is written......</div>Server-Folder: '.PATH_site.'typo3temp/';
			$this->outputXMLreply($statusListText,'true','t3sWriteTypo3Temp',trim($_POST['t3sWriteTypo3Temp']));
	}
	function t3sWriteLocalconf(){
		   $t3sWriteLocalconf = trim($_POST['t3sWriteLocalconf']);
		   	if($t3sWriteLocalconf == 'false'){
		   		$t3sExtList = '';
		   		$statusListText = '<div style="color:red;font-weight: bold;">Localconf Extension-List is NOT written!</div>';
		   		$action = 'false';
		   	}else{
		   		$t3sExtList = $t3sWriteLocalconf.','.trim($_POST['t3ssetup']);
		   		$statusListText = '<div style="color:green;font-weight: bold;">Localconf is written......</div>File: '.PATH_site.'typo3conf/localconf.php';
		   		$action = 'true';
		   	}
       	 	$t3s_write_localconf = t3lib_div::makeInstance('tx_t3s_library_writelocalconf');

	    	$path = PATH_site.'typo3conf/ext/'.trim($_POST['t3ssetup']).'/t3sinstalltool/t3x';
	    	$files = t3lib_div::getFilesInDir($path);
			if(is_array($files)){
				foreach($files as $value){
					$t3sExtList .= ','.str_replace('.t3x','',$value);
				}
			}
			$t3s_write_localconf->main($t3sExtList,trim($_POST['t3sCExt']),trim($_POST['t3ssetup']));
			$this->outputXMLreply($statusListText,$action,'t3sWriteLocalconf',$t3sWriteLocalconf);
	}
    function t3sHtaccess(){
		if($this->isApacheModRewrite()){
			if(copy(PATH_site.'typo3conf/ext/'.trim($_POST['t3ssetup']).'/t3sinstalltool/_.htaccess',PATH_site.'.htaccess')){
				$statusListText = '<div style="color:green;font-weight: bold;">Htaccess is written......</div>';
				$action = 'true';
			}else{
		        $statusListText = '<div style="color:red;font-weight: bold;">Htaccess is NOT written!!!</div>Server-Folder: '.PATH_site;
		        $action = 'false';
			}
		}else{
	        $statusListText = '<div style="color:red;font-weight: bold;">Htaccess is NOT written!!!</div>Server-Folder: '.PATH_site;
	        $action = 'false';
		}
       $this->outputXMLreply($statusListText,$action,'t3sHtaccess',trim($_POST['t3sHtaccess']));
    }
    function t3sWriteFileadmin(){
       	    $source = 'typo3conf/ext/'.trim($_POST['t3ssetup']).'/t3sinstalltool/fileadmin';
       	    $dest = 'fileadmin';
       	    if(is_dir(PATH_site.$source)){
       	 		$t3s_packeges = t3lib_div::makeInstance('tx_t3s_library_dircpy');
				$t3s_packeges->main(PATH_site,$source,$dest);
       	    }
			$statusListText = '<div style="color:green; font-weight: bold;">Fileadmin is written......</div>Server-Folder: '.PATH_site.'fileadmin/';
			$this->outputXMLreply($statusListText,'true','t3sWriteFileadmin',trim($_POST['t3sWriteFileadmin']));
    }
    function t3sDISABLE_T3S_INSTALL_TOOL(){
    	touch(PATH_site.'typo3conf/DISABLE_T3S_INSTALL_TOOL');
    	$statusListText = '<div style="color:green;font-weight: bold;">T3S Install-Tool is locked!!!</div>';
    	$this->outputXMLreply($statusListText,'true','t3sUnableInstallTool',trim($_POST['t3sUnableInstallTool']));
    }
	function t3sTerimport(){
		$terI = t3lib_div::makeInstance('tx_t3s_library_terimport');
		$terI->init();
		foreach($terI->include_once as $INC_FILE) {
				include_once($INC_FILE);
		}
		$terI->checkExtObj();
		$terI->main(trim($_POST['t3sTerimport']));
		if($terI->t3sImportExtensionLoaded()){
           $statusListText = '<div style="color:green; font-weight: bold;">Extension "'.$_POST['t3sTerimport'].'" downloaded ...</div>Server-Folder: '.PATH_site.'typo3conf/ext/'.$_POST['t3sTerimport'].'/'.'';
		   $action = 'true';
		}else{
		   $statusListText = '<div style="color:red;font-weight: bold;">Extension "'.$_POST['t3sTerimport'].'" NOT LOADED !!!</div>';
		   $action = 'false';
		}
		$this->outputXMLreply($statusListText,$action,'t3sTerimport',trim($_POST['t3sTerimport']));
	}
	function t3sSQL(){
		  $installPack = trim($_POST['t3ssetup']);
		  $this->t3sForceDBupdatesTerImport(trim($_POST['t3ssetup']),trim($_POST['t3sCExt']));
		  $t3sCExt =  trim($_POST['t3sCExt']);
		  $GLOBALS['TYPO3_DB']->exec_UPDATEquery('sys_template','uid=1',array('include_static_file'=>'EXT:'.$t3sCExt.'/temp/ts/'));
		  $statusListText = '<div style="color:green; font-weight: bold;">SQL is inserted and a backup was made......</div>';
          $this->outputXMLreply($statusListText,'true','t3sSql','true');
	}
	function t3sCreateExtension(){
        $installPack = trim($_POST['t3ssetup']);
		$extName = trim($_POST['t3sCreateExtension']);
		$replaceFileContent = array();
        #$replaceFileContent[] =  array('search'=>'ext_tables.sql','replace'=>'/t3s/t3sinstall/setup.txt');
        #$replaceFileContent[] =  array('search'=>'ext_tables_static+adt.sql','replace'=>'/t3s/t3sinstall/setup.txt');
		$excludeDir = array();
		#$excludeDir[] = '/'.$installPack.'/t3sinstalltool';
		$changeFile = array();
		#$changeFile[] = array('search'=>'/'.$installPack.'/ext_tables.php','replace'=>'/t3s/t3sinstall/ext_tables.php');
	    #$changeFile[] = array('search'=>'/'.$installPack.'/ext_localconf.php','replace'=>'/t3s/t3sinstall/ext_localconf.php');
        $changeFile[] = array('search'=>'/'.$installPack.'/ext_emconf.php','replace'=>'/t3s/t3sinstall/ext_emconf.php');
		#$changeFile[] = array('search'=>'/'.$installPack.'/ext_tables.sql','replace'=>'/t3s/t3sinstall/ext_tables.sql');
        #$changeFile[] = array('search'=>'/'.$installPack.'/ext_tables_static+adt.sql','replace'=>'/t3s/t3sinstall/ext_tables_static+adt.sql');
		$config['basePath'] = PATH_site.'typo3conf/ext';
		$config['sourceFolder'] = '/'.$installPack.'';
		$config['destFolder'] = '/t3s'.$extName;
		$config['searchInFile'] = ''.$installPack.'';
		$config['replaceInFile'] = 't3s'.$extName;
		$config['excludeDir'] = $excludeDir;
		$config['changeFile'] = $changeFile;
		$t3sCE = t3lib_div::makeInstance('tx_t3s_library_createextension');
		$t3sCE->main($config,$replaceFileContent);
		$statusListText = '<div style="color:green; font-weight: bold;">T3S-Extension "t3s'.$_POST['t3sCreateExtension'].'" is created......</div>';
	    $this->outputXMLreply($statusListText,'true','t3sCreateExtension',$extName);
	}
	function outputXMLreply($statusListText,$action,$requestKey,$requestValue)	{
		$xml .= $statusListText.'||||';
        $xml .= $action.'||||';
        $xml .= $requestKey.'||||';
        $xml .= $requestValue;
		echo $xml;
	}
	function locked(){
		  $statusListText = '<div style="color:red;">The Install Tool is locked!</div>Fix: Remove file typo3conf/DISABLE_T3S_INSTALL_TOOL. This file may simply be empty.';
		  $this->outputXMLreply($statusListText,'false','locked','locked');
	}
	function t3sForceDBupdates(){
	    $extList =	(array)explode(',',trim($_POST['t3sForceDBupdates']));
	    foreach($extList as $ext){
		    if(strlen(trim($ext))){
	          $this->t3sForceDBupdatesTerImport($ext);
		    }
	    }
		$statusListText = '<div style="color:green; font-weight: bold;">Extension SQL is inserted......</div>';
	    $this->outputXMLreply($statusListText,'true','t3sForceDBupdates','t3sForceDBupdates');
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
	function t3sForceDBupdatesTerImport($key,$replace = null){
			$SOBE = t3lib_div::makeInstance('tx_t3s_library_terimport');
			$SOBE->init();
			foreach($SOBE->include_once as $INC_FILE) {
				include_once($INC_FILE);
			}
			$SOBE->checkExtObj();
			$SOBE->t3sForceDBupdates($key,$replace);
	}
	function isApacheModRewrite(){
		if(function_exists('apache_get_modules')){
			$agm = @apache_get_modules();
			if(!in_array('mod_rewrite',$agm)){
				return false;
			}
		}else{
			 ob_start();
			 phpinfo();
			 $s = ob_get_contents();
			 ob_end_clean();
			if(!strstr($s,'mod_rewrite')){
				return false;
			}
		}
		return true;
	}
}
if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_ajaxresponse.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_ajaxresponse.php"]);
}
?>