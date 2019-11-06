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
require_once(t3lib_extMgm::extPath('t3s').'library/class.tx_t3s_library_installtool.php');
class tx_t3s_library_installtoolview extends tx_t3s_library_installtool{
	function main()	{
		global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;
		$this->pageinfo = t3lib_BEfunc::readPageAccess($this->id,$this->perms_clause);
		$access = is_array($this->pageinfo) ? 1 : 0;
		$this->t3sInstallToolWarningNormal();
		if(isset($_POST['data']['t3sXMLList'])){
				$this->t3sTerXMLList();
		}
		if ($this->t3sInstallToolWarningFatal() && (($this->id && $access) || ($BE_USER->user['admin'] && !$this->id)))	{
			if((boolean)($_POST['data']['t3sInstallYes']) && (boolean)strlen(trim($_POST['data']['t3sInstallPackageSelectedSupport']))  ){
			    $t3sinstallpackage = 	trim($_POST['data']['t3sInstallPackageSelectedSupport']);
				$this->t3sTerImport($t3sinstallpackage);
			    $infoInstall = 'Select A Distribution: ';
			}else if((boolean)($_POST['data']['t3sInstallYes']) &&  (boolean)strlen(trim($_POST['data']['t3sInstallPackage']))){
			    $t3sinstallpackage = 	trim($_POST['data']['t3sInstallPackage']);
				$this->t3sTerImport($t3sinstallpackage);
			    $infoInstall = 'Select B Distribution: ';
			}else if((boolean)($_POST['data']['t3sInstallYes']) && (boolean)strlen(trim($_POST['data']['t3sInstallPackageSelected']))){
				$t3sinstallpackage = trim($_POST['data']['t3sInstallPackageSelected']);
				$infoInstall = 'Select C Distribution: ';
			}
           if($t3sinstallpackage && is_dir(PATH_site.'typo3conf/ext/'.$t3sinstallpackage) && (boolean)($_POST['data']['t3sInstallYes'])){
                 $this->buildForm($t3sinstallpackage,$infoInstall.$t3sinstallpackage);
			}else{
				 $this->buildT3SInstallForm();
			}
		}else  {
             $this->installWarning();
		}
	}

	function buildT3SInstallForm(){
		global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;
			$this->doc = t3lib_div::makeInstance('bigDoc');
			$this->doc->backPath = $BACK_PATH;
			$this->doc->form='<form action="" method="POST" >';
			$this->content.=$this->doc->startPage($LANG->getLL('title'));
            $HTMLformTable .= '<div id="t3sform" style=" margin-left: 30px; margin-top: 20px;">';
            $HTMLformTable .= '<div style="padding: 0px; background-color: transparent; display: block;">'.$this->makeInstallWarningList('WARNING',$this->installWarningsNormal).'</div>';
            if(strlen(trim($_POST['data']['t3sSubmitInstall']))){
            	$errrorS ='<div style="padding-left: 10px; background-color: transparent; display: inline; color: red; font-weight: bold;">Please select A,B or C and select YES!</div>';
            }
            $HTMLformTable .= $this->makeTableTr('t3sInstallPackageSelectedSupport','<select name="data[t3sInstallPackageSelectedSupport]" id="t3sInstallPackageSelectedSupport" >'.$this->buildSupportSelectBox().'</select>');
            $HTMLformTable .= $this->makeTableTr('t3sInstallPackage','<input type="text" name="data[t3sInstallPackage]" id="t3sInstallPackage" value=""  size=50 />');
            $HTMLformTable .= $this->makeTableTr('t3sInstallPackageSelected','<select name="data[t3sInstallPackageSelected]" id="t3sInstallPackageSelected" >'.$this->buildSelectBox().'</select>');
            $HTMLformTable .= $this->makeTableTr('t3sInstallYes','<input type="checkbox" name="data[t3sInstallYes]" id="t3sInstallYes" value="1"  />   <strong>Yes,</strong> this is a new Typo3-Installation (fresh Database and a empty Dummy-Package!)');
            $HTMLformTable .= $this->makeTableTr('t3sSubmitInstall','<input style="border: 1px solid black; font-weight: bold;" type="submit" name="data[t3sSubmitInstall]" value="'.$LANG->getLL('t3sInstallPackageSubmit').'"/>'.$errrorS);
            $HTMLformTable .= '</div>';
			$this->content.=$this->doc->section('',$this->fetchMetaData.$HTMLformTable);
			$this->content.=$this->doc->spacer(10);
    }
    function buildSelectBox(){
    	$option = (array)$this->t3sFindInstallPackage();
    	$out = '<option value="">Select from typo3conf/ext/...</option>';
    	foreach($option as $v){
    		$out .= '<option style="background: yellow; font-weight: bold;" value="'.$v.'">Extension: '.$v.'</option>';
    	}
    	return $out;
    }
    function buildSupportSelectBox(){
    	$out = '<option value="">Select a T3S Distribution...</option>';
		$out .= '<option style="background: yellow; font-weight: bold;" value="t3sugar">Extension: T3Sugar (with the Typo3 CSS Framework and DAM, RealUrl)</option>';
		$out .= '<option style="background: yellow; font-weight: bold;" value="t3s_starter">Extension:  T3S_Starter (with news, gallery and DAM, RealUrl)</option>';
    	return $out;
    }
    function buildForm($t3sinstallpackage,$infoInstall){
		global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;
				// Draw the header.

			$this->doc = t3lib_div::makeInstance('bigDoc');
			$this->doc->backPath = $BACK_PATH;
			$this->doc->form='<form  action="index.php" method="POST" onsubmit="return sendAjax();"><input type="hidden" name="data[t3ssetup]" value="'.$t3sinstallpackage.'" id="t3ssetup" />';
		    $this->doc->JScode = '<script language="javascript" type="text/javascript" src="../library/tx_t3s_library_ajaxrequest.js"></script>';
			$this->content.=$this->doc->startPage($LANG->getLL('title'));
            $HTMLinstall = '<div style="font-weight: bold; margin: 20px;" id="statusCount"></div>';
            $HTMLinstall .=  '<div style="margin-left: 20px;" id="statusWarning"></div>';
            $HTMLinstall .= '<ol id="statusList"></ol>';
            $HTMLinstall .= '<div style="margin-left: 20px;" id="statusSpinner"></div>';
            $HTMLformTable = '<div id="t3sform" style="margin-left: 30px;" >';
            $HTMLformTable .= '<div style="padding: 0px; background-color: transparent; display: block;">'.$infoInstall.'</div>';
            $HTMLformTable .= '<div style="padding: 0px; background-color: transparent; display: block;">'.$this->makeInstallWarningList('WARNING',$this->installWarningsNormal).'</div>';
            $HTMLformTable .= $this->makeTableTr('t3sCreateExtension','<strong style="font-weight: bold; background:yellow; line-height: 1em; padding: 1px; border: 1px solid gray;  border-right: 0px;">t3s</strong><input type="text" style="border-left: 0px; font-weight: bold;" name="data[t3sCreateExtension]" id="t3sCreateExtension" value="newConfigAndLayoutLibraryName"  size=50 />');
            $HTMLformTable .= $this->makeTableTr('t3sSql','<input type="checkbox" name="data[t3sSql]" checked="checked" id="t3sSql" />');
            $HTMLformTable .= $this->makeTableTr('t3sHtaccess','<input type="checkbox" name="data[t3sHtaccess]" checked="checked" id="t3sHtaccess" />');
            $HTMLformTable .= $this->makeTableTr('t3sWriteFileadmin','<input type="checkbox" name="data[t3sWriteFileadmin]" checked="checked" id="t3sWriteFileadmin" />');
            $HTMLformTable .= $this->makeTableTr('t3sTerimport','<textarea type="text" name="data[t3sTerimport]"  id="t3sTerimport" cols="50" rows="5" />'.file_get_contents(PATH_site.'typo3conf/ext/'.$t3sinstallpackage.'/t3sinstalltool/terimport.txt').'</textarea>');
            $HTMLformTable .= $this->makeTableTr('t3ssubmit','<input style="border: 1px solid black; font-weight: bold;" type="submit" name="data[submit]" value="'.$LANG->getLL('t3ssubmitvalue').'"/>');
			$HTMLformTable .= '</div>';


            $this->content.=$this->doc->section('',$HTMLinstall.$HTMLformTable);
			$this->content.=$this->doc->spacer(10);
    }
    function makeTableTr($key,$input){
    	global $LANG;
    	return '<div style="padding: 5px; background-color: #B8BEC9; display: block;">'.str_replace(']','</strong>',str_replace('[','<strong>',$LANG->getLL($key))).'</div><div style="padding: 10px; background-color: transparent; display: block;">'.$input.'</div>';
    }
    function installWarning(){
    	 global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;
			$this->doc = t3lib_div::makeInstance('bigDoc');
			$this->doc->backPath = $BACK_PATH;
			$this->doc->form='<form  action="index.php" method="POST" >';
			$this->content.=$this->doc->startPage($LANG->getLL('title'));
            $HTMLformTable = '<div id="t3sform" style="margin-left: 30px;" ><div style="padding: 0px; background-color: transparent; display: block;">'.$this->makeInstallWarningList('ERROR',$this->installWarningsFatal).$this->makeInstallWarningList('WARNING',$this->installWarningsNormal).'</div></div>';

			$this->content.=$this->doc->section('',$HTMLformTable.$this->getXMLListButton());
			$this->content.=$this->doc->spacer(10);
    }
    function getXMLListButton(){
    	global $BE_USER,$LANG,$BACK_PATH,$TCA_DESCR,$TCA,$CLIENT,$TYPO3_CONF_VARS;
    	return '<div id="t3sform" style="margin-left: 30px;" >'.$this->makeTableTr('getXMLListButtonLabel','<input value="'.$LANG->getLL('getXMLListButtonLabelvalue').'"  type="submit" name="data[t3sXMLList]">').'</div>';
    }
}
if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_installtoolview.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_installtoolview.php"]);
}
?>
