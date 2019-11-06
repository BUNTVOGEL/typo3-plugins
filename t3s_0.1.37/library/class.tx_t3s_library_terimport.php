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
require_once('../../../../typo3/mod/tools/em/class.em_index.php');
class tx_t3s_library_terimport extends SC_mod_tools_em_index{
	var $errimportExt = array();
	var $currentExt = '';
	function isEmptyNotTable($table){
		$querySelection['select'] = '*';
		$querySelection['table'] = $table;
		$querySelection['where'] = '';
		$querySelection['groupBy'] = '';
		$querySelection['orderBy'] = '';
		$querySelection['limit'] = '2';
       return  $this->isSelectAble($querySelection);
	}
	function isSelectAble($query) {
		$res = $GLOBALS['TYPO3_DB']->exec_SELECTquery($query['select'],
													      $query['table'],
														  $query['where'],
														  $query['groupBy'],
														  $query['orderBy'],
														  $query['limit']);
		$rows = array ();
		while ($row = @$GLOBALS['TYPO3_DB']->sql_fetch_assoc($res)) {
			$rows[] = $row;
		}
		@$GLOBALS['TYPO3_DB']->sql_free_result($res);
		return (boolean) count($rows);
	}
	function t3sForceDBupdates($extKey,$replace)	{
		$instObj = new t3lib_install;
        $path = PATH_site.'typo3conf/ext/'.$extKey.'/';
			// Updating tables and fields?
		if (@is_file($path.'ext_tables.sql'))	{
			if($replace != null){
				$fileContent =  str_replace("'typo3conf/ext/".$extKey,"'typo3conf/ext/".$replace,file_get_contents($path.'ext_tables.sql'));
			}else{
				$fileContent = file_get_contents($path.'ext_tables.sql');
			}
			$FDfile = $instObj->getFieldDefinitions_sqlContent($fileContent);
			if (count($FDfile))	{
				$FDdb = $instObj->getFieldDefinitions_database(TYPO3_db);
				$diff = $instObj->getDatabaseExtra($FDfile, $FDdb);
				$update_statements = $instObj->getUpdateSuggestions($diff);

				foreach((array)$update_statements['add'] as $string)	{
					$GLOBALS['TYPO3_DB']->admin_query($string);
				}
				foreach((array)$update_statements['change'] as $string)	{
					$GLOBALS['TYPO3_DB']->admin_query($string);
				}
				foreach((array)$update_statements['create_table'] as $string)	{
					$GLOBALS['TYPO3_DB']->admin_query($string);
				}
			}
		}

			// Importing static tables?
		if (@is_file($path.'ext_tables_static+adt.sql'))	{
			if($replace != null){
				$fileContent =  str_replace("'typo3conf/ext/".$extKey,"'typo3conf/ext/".$replace,file_get_contents($path.'ext_tables_static+adt.sql'));
			}else{
				$fileContent = file_get_contents($path.'ext_tables_static+adt.sql');
			}

			$statements = $instObj->getStatementArray($fileContent,1);
			list($statements_table, $insertCount) = $instObj->getCreateTables($statements,1);

				// Traverse the tables
			foreach($statements_table as $table => $query)	{
			  	if($this->isEmptyNotTable($table)){
			  		$GLOBALS['TYPO3_DB']->admin_query('ALTER TABLE '.$table.' RENAME t3s_'.trim(date("YmdHis").'_'.$table));
			  	}
				$GLOBALS['TYPO3_DB']->admin_query('DROP TABLE IF EXISTS '.$table);
				$GLOBALS['TYPO3_DB']->admin_query($query);

				if ($insertCount[$table])	{
					$statements_insert = $instObj->getTableInsertStatements($statements, $table);

					foreach($statements_insert as $v)	{
						$GLOBALS['TYPO3_DB']->admin_query($v);
					}
				}
			}
		}
	}
    function initMain(){
    	parent::main();
    }
	/**
	 * Main function for Extension Manager module.
	 *
	 * @return	void
	 */
	function main($t3sExtensions)	{
		global $BE_USER,$LANG,$TYPO3_CONF_VARS;
		if (empty($this->MOD_SETTINGS['mirrorListURL'])) $this->MOD_SETTINGS['mirrorListURL'] = $TYPO3_CONF_VARS['EXT']['em_mirrorListURL'];
        $this->t3sImportExtension($this->getTerImportArray($t3sExtensions));
	}
	function t3sImportExtension($t3sExtensions){
		foreach((array)$t3sExtensions as $ext){
			$this->CMD = $ext;
			$this->currentExt = $ext['importExt'];
			if ($ext['importExt'] )	{	// Imports an extension from online rep.
				$this->errimportExt = $this->importExtFromRep($ext['importExt'],$ext['extVersion'],'L','');

				if(!$this->errimportExt && $ext['importExt']) {
					$this->installTranslationsForExtension($ext['importExt'], $this->getMirrorURL());
				}
			}
		}
	}
	function t3sImportExtensionLoaded()	{
		if (!$this->errimportExt && @is_dir(PATH_site.'typo3conf/ext/'.$this->currentExt.'/')) {
			return true;
		}else{
			return false;
		}

	}
	function getTerImportArray($str){
		$terImportArray = array();
		$arrayA = explode(',',$str);
        foreach((array)$arrayA as $value){
        	$arrayB = explode(':',$value);
        	$ext['importExt'] = trim($arrayB[0]);
        	$ext['extVersion'] = trim($arrayB[1]);
        	$terImportArray[] = $ext;
        }
        return $terImportArray;
	}
	function importExtFromRep($extKey,$version,$loc,$uploadFlag=0,$dontDelete=0,$directInput='')	{

		$uploadSucceed = false;
		$uploadedTempFile = '';
		if (is_array($directInput))	{
			$fetchData = array($directInput,'');
			$loc = ($loc==='G'||$loc==='S') ? $loc : 'L';
		} elseif ($uploadFlag)	{
			if (($uploadedTempFile = $this->CMD['alreadyUploaded']) || $_FILES['upload_ext_file']['tmp_name'])	{

					// Read uploaded file:
				if (!$uploadedTempFile)	{
					if (!is_uploaded_file($_FILES['upload_ext_file']['tmp_name'])) {
 						t3lib_div::sysLog('Possible file upload attack: '.$_FILES['upload_ext_file']['tmp_name'], 'Extension Manager', 3);

						return 'File was not uploaded?!?';
					}

					$uploadedTempFile = t3lib_div::upload_to_tempfile($_FILES['upload_ext_file']['tmp_name']);
				}
				$fileContent = t3lib_div::getUrl($uploadedTempFile);

				if (!$fileContent)	return 'File is empty!';

					// Decode file data:
				$fetchData = $this->terConnection->decodeExchangeData($fileContent);

				if (is_array($fetchData))	{
					$extKey = $fetchData[0]['extKey'];
					if ($extKey)	{
						if (!$this->CMD['uploadOverwrite'])	{
							$loc = ($loc==='G'||$loc==='S') ? $loc : 'L';
							$comingExtPath = PATH_site.$this->typePaths[$loc].$extKey.'/';
							if (@is_dir($comingExtPath))	{
								return 'Extension was already present in "'.$comingExtPath.'" - and the overwrite flag was not set! So nothing done...';
							}	// ... else go on, install...
						}	// ... else go on, install...
					} else return 'No extension key in file. Strange...';
				} else return 'Wrong file format. No data recognized, '.$fetchData;
			} else return 'No file uploaded! Probably the file was too large for PHPs internal limit for uploadable files.';
		} else {
			$this->xmlhandler->searchExtensionsXML($extKey, '', '', true, true);

				// Fetch extension from TER:
			if(!strlen($version)) {
				$versions = (array)array_keys((array)$this->xmlhandler->extensionsXML[$extKey]['versions']);
				usort($versions, array('tx_t3s_library_terimport', 'compare'));
				$version = end($versions);
			}
			$fetchData = $this->terConnection->fetchExtension($extKey, $version, $this->xmlhandler->extensionsXML[$extKey]['versions'][$version]['t3xfilemd5'], $this->getMirrorURL());
		}

		// At this point the extension data should be present; so we want to write it to disc:
		if ($this->importAsType($loc))	{
			if (is_array($fetchData))	{	// There was some data successfully transferred
				if ($fetchData[0]['extKey'] && is_array($fetchData[0]['FILES']))	{
					$extKey = $fetchData[0]['extKey'];
					if(!isset($fetchData[0]['EM_CONF']['constraints'])) $fetchData[0]['EM_CONF']['constraints'] = $this->xmlhandler->extensionsXML[$extKey]['versions'][$version]['dependencies'];
					$EM_CONF = $this->fixEMCONF($fetchData[0]['EM_CONF']);
					if (!$EM_CONF['lockType'] || !strcmp($EM_CONF['lockType'],$loc))	{
							// check dependencies, act accordingly if ext is loaded
						list($instExtInfo,)=$this->getInstalledExtensions();
						$depStatus = $this->checkDependencies($extKey, $EM_CONF, $instExtInfo);
						if(t3lib_extMgm::isLoaded($extKey) && !$depStatus['returnCode']) {
							$this->content .= $depStatus['html'];
							if ($uploadedTempFile)	{
								$this->content .= '<input type="hidden" name="CMD[alreadyUploaded]" value="'.$uploadedTempFile.'" />';
							}
						} else {
							$res = $this->clearAndMakeExtensionDir($fetchData[0],$loc,$dontDelete);
							if (is_array($res))	{
								$extDirPath = trim($res[0]);
								if ($extDirPath && @is_dir($extDirPath) && substr($extDirPath,-1)=='/')	{

									$emConfFile = $this->construct_ext_emconf_file($extKey,$EM_CONF);
									$dirs = $this->extractDirsFromFileList(array_keys($fetchData[0]['FILES']));

									$res = $this->createDirsInPath($dirs,$extDirPath);
									if (!$res)	{
										$writeFiles = $fetchData[0]['FILES'];
										$writeFiles['ext_emconf.php']['content'] = $emConfFile;
										$writeFiles['ext_emconf.php']['content_md5'] = md5($emConfFile);

											// Write files:
										foreach($writeFiles as $theFile => $fileData)	{
											t3lib_div::writeFile($extDirPath.$theFile,$fileData['content']);
											if (!@is_file($extDirPath.$theFile))	{
												$content.='Error: File "'.$extDirPath.$theFile.'" could not be created!!!<br />';
											} elseif (md5(t3lib_div::getUrl($extDirPath.$theFile)) != $fileData['content_md5']) {
												$content.='Error: File "'.$extDirPath.$theFile.'" MD5 was different from the original files MD5 - so the file is corrupted!<br />';
											}
										}

											// No content, no errors. Create success output here:
										if (!$content)	{
											$content='SUCCESS: '.$extDirPath.'<br />';

											$uploadSucceed = true;

												// Fix TYPO3_MOD_PATH for backend modules in extension:
											$modules = t3lib_div::trimExplode(',',$EM_CONF['module'],1);
											if (count($modules))	{
												foreach($modules as $mD)	{
													$confFileName = $extDirPath.$mD.'/conf.php';
													if (@is_file($confFileName))	{
														$content.= $this->writeTYPO3_MOD_PATH($confFileName,$loc,$extKey.'/'.$mD.'/').'<br />';
													} else $content.='Error: Couldn\'t find "'.$confFileName.'"<br />';
												}
											}
												// NOTICE: I used two hours trying to find out why a script, ext_emconf.php, written twice and in between included by PHP did not update correct the second time. Probably something with PHP-A cache and mtime-stamps.
												// But this order of the code works.... (using the empty Array with type, EMCONF and files hereunder).

												// Writing to ext_emconf.php:
											$sEMD5A = $this->serverExtensionMD5Array($extKey,array('type' => $loc, 'EM_CONF' => array(), 'files' => array()));
											$EM_CONF['_md5_values_when_last_written'] = serialize($sEMD5A);
											$emConfFile = $this->construct_ext_emconf_file($extKey,$EM_CONF);
											t3lib_div::writeFile($extDirPath.'ext_emconf.php',$emConfFile);

											$content.='ext_emconf.php: '.$extDirPath.'ext_emconf.php<br />';
											$content.='Type: '.$loc.'<br />';

												// Remove cache files:
											if (t3lib_extMgm::isLoaded($extKey))	{
												if ($this->removeCacheFiles())	{
													$content.='Cache-files are removed and will be re-written upon next hit<br />';
												}

												list($new_list)=$this->getInstalledExtensions();
												$content.=$this->updatesForm($extKey,$new_list[$extKey],1,'index.php?CMD[showExt]='.$extKey.'&SET[singleDetails]=info');
											}

												// Install / Uninstall:
											if(!$this->CMD['standAlone']) {
												$content = '<a href="index.php" class="typo3-goBack"><img'.t3lib_iconWorks::skinImg($GLOBALS['BACK_PATH'],'gfx/goback.gif','width="14" height="14"').' alt="" /> Go back</a><br />'.$content;
												$content.='<h3>Install / Uninstall Extension:</h3>';
												$content.= $new_list[$extKey] ?
													'<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[remove]=1&CMD[clrCmd]=1&SET[singleDetails]=info').'">'.$this->removeButton().' Uninstall extension</a>' :
													'<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[load]=1&CMD[clrCmd]=1&SET[singleDetails]=info').'">'.$this->installButton().' Install extension</a>';
											} else {
												$content = 'Extension has been imported.<br /><br /><a href="javascript:opener.top.content.document.forms[0].submit();window.close();">Close window and recheck dependencies</a>';
											}

										}
									} else $content = $res;
								} else $content = 'Error: The extension path "'.$extDirPath.'" was different than expected...';
							} else $content = $res;
						}
					} else $content = 'Error: The extension can only be installed in the path '.$this->typePaths[$EM_CONF['lockType']].' (lockType='.$EM_CONF['lockType'].')';
				} else $content = 'Error: No extension key!!! Why? - nobody knows... (Or no files in the file-array...)';
			}  else $content = 'Error: The datatransfer did not succeed. '.$fetchData;
		}  else $content = 'Error: Installation is not allowed in this path ('.$this->typePaths[$loc].')';

		$this->content.=$this->doc->section('Extension import results',$content,0,1);

		if ($uploadSucceed && $uploadedTempFile)	{
			t3lib_div::unlink_tempfile($uploadedTempFile);
		}

		return false;
	}
    function writeT3XFileToTypo3Conf($uploadedTempFile){
    	        $fileContent = t3lib_div::getUrl($uploadedTempFile);
				$fetchData = $this->terConnection->decodeExchangeData($fileContent);

				if (is_array($fetchData))	{
					$extKey = $fetchData[0]['extKey'];
					if ($extKey)	{
						if (!$this->CMD['uploadOverwrite'])	{
							$loc ='L';
							$comingExtPath = PATH_site.$this->typePaths[$loc].$extKey.'/';
							if (@is_dir($comingExtPath))	{
								return 'Extension was already present in "'.$comingExtPath.'" - and the overwrite flag was not set! So nothing done...';
							}	// ... else go on, install...
						}	// ... else go on, install...
					} else return 'No extension key in file. Strange...';
				} else return 'Wrong file format. No data recognized, '.$fetchData;

		// At this point the extension data should be present; so we want to write it to disc:
		if ($this->importAsType($loc))	{
			if (is_array($fetchData))	{	// There was some data successfully transferred
				if ($fetchData[0]['extKey'] && is_array($fetchData[0]['FILES']))	{
					$extKey = $fetchData[0]['extKey'];
					if(!isset($fetchData[0]['EM_CONF']['constraints'])) $fetchData[0]['EM_CONF']['constraints'] = $this->xmlhandler->extensionsXML[$extKey]['versions'][$version]['dependencies'];
					$EM_CONF = $this->fixEMCONF($fetchData[0]['EM_CONF']);
					if (!$EM_CONF['lockType'] || !strcmp($EM_CONF['lockType'],$loc))	{
							// check dependencies, act accordingly if ext is loaded
						list($instExtInfo,)=$this->getInstalledExtensions();
						$depStatus = $this->checkDependencies($extKey, $EM_CONF, $instExtInfo);
						if(t3lib_extMgm::isLoaded($extKey) && !$depStatus['returnCode']) {
							$this->content .= $depStatus['html'];
							if ($uploadedTempFile)	{
								$this->content .= '<input type="hidden" name="CMD[alreadyUploaded]" value="'.$uploadedTempFile.'" />';
							}
						} else {
							$res = $this->clearAndMakeExtensionDir($fetchData[0],$loc,$dontDelete);
							if (is_array($res))	{
								$extDirPath = trim($res[0]);
								if ($extDirPath && @is_dir($extDirPath) && substr($extDirPath,-1)=='/')	{

									$emConfFile = $this->construct_ext_emconf_file($extKey,$EM_CONF);
									$dirs = $this->extractDirsFromFileList(array_keys($fetchData[0]['FILES']));

									$res = $this->createDirsInPath($dirs,$extDirPath);
									if (!$res)	{
										$writeFiles = $fetchData[0]['FILES'];
										$writeFiles['ext_emconf.php']['content'] = $emConfFile;
										$writeFiles['ext_emconf.php']['content_md5'] = md5($emConfFile);

											// Write files:
										foreach($writeFiles as $theFile => $fileData)	{
											t3lib_div::writeFile($extDirPath.$theFile,$fileData['content']);
											if (!@is_file($extDirPath.$theFile))	{
												$content.='Error: File "'.$extDirPath.$theFile.'" could not be created!!!<br />';
											} elseif (md5(t3lib_div::getUrl($extDirPath.$theFile)) != $fileData['content_md5']) {
												$content.='Error: File "'.$extDirPath.$theFile.'" MD5 was different from the original files MD5 - so the file is corrupted!<br />';
											}
										}

											// No content, no errors. Create success output here:
										if (!$content)	{
											$content='SUCCESS: '.$extDirPath.'<br />';

											$uploadSucceed = true;

												// Fix TYPO3_MOD_PATH for backend modules in extension:
											$modules = t3lib_div::trimExplode(',',$EM_CONF['module'],1);
											if (count($modules))	{
												foreach($modules as $mD)	{
													$confFileName = $extDirPath.$mD.'/conf.php';
													if (@is_file($confFileName))	{
														$content.= $this->writeTYPO3_MOD_PATH($confFileName,$loc,$extKey.'/'.$mD.'/').'<br />';
													} else $content.='Error: Couldn\'t find "'.$confFileName.'"<br />';
												}
											}
												// NOTICE: I used two hours trying to find out why a script, ext_emconf.php, written twice and in between included by PHP did not update correct the second time. Probably something with PHP-A cache and mtime-stamps.
												// But this order of the code works.... (using the empty Array with type, EMCONF and files hereunder).

												// Writing to ext_emconf.php:
											$sEMD5A = $this->serverExtensionMD5Array($extKey,array('type' => $loc, 'EM_CONF' => array(), 'files' => array()));
											$EM_CONF['_md5_values_when_last_written'] = serialize($sEMD5A);
											$emConfFile = $this->construct_ext_emconf_file($extKey,$EM_CONF);
											t3lib_div::writeFile($extDirPath.'ext_emconf.php',$emConfFile);

											$content.='ext_emconf.php: '.$extDirPath.'ext_emconf.php<br />';
											$content.='Type: '.$loc.'<br />';

												// Remove cache files:
											if (t3lib_extMgm::isLoaded($extKey))	{
												if ($this->removeCacheFiles())	{
													$content.='Cache-files are removed and will be re-written upon next hit<br />';
												}

												list($new_list)=$this->getInstalledExtensions();
												$content.=$this->updatesForm($extKey,$new_list[$extKey],1,'index.php?CMD[showExt]='.$extKey.'&SET[singleDetails]=info');
											}

												// Install / Uninstall:
											if(!$this->CMD['standAlone']) {
												$content = '<a href="index.php" class="typo3-goBack"><img'.t3lib_iconWorks::skinImg($GLOBALS['BACK_PATH'],'gfx/goback.gif','width="14" height="14"').' alt="" /> Go back</a><br />'.$content;
												$content.='<h3>Install / Uninstall Extension:</h3>';
												$content.= $new_list[$extKey] ?
													'<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[remove]=1&CMD[clrCmd]=1&SET[singleDetails]=info').'">'.$this->removeButton().' Uninstall extension</a>' :
													'<a href="'.htmlspecialchars('index.php?CMD[showExt]='.$extKey.'&CMD[load]=1&CMD[clrCmd]=1&SET[singleDetails]=info').'">'.$this->installButton().' Install extension</a>';
											} else {
												$content = 'Extension has been imported.<br /><br /><a href="javascript:opener.top.content.document.forms[0].submit();window.close();">Close window and recheck dependencies</a>';
											}

										}
									} else $content = $res;
								} else $content = 'Error: The extension path "'.$extDirPath.'" was different than expected...';
							} else $content = $res;
						}
					} else $content = 'Error: The extension can only be installed in the path '.$this->typePaths[$EM_CONF['lockType']].' (lockType='.$EM_CONF['lockType'].')';
				} else $content = 'Error: No extension key!!! Why? - nobody knows... (Or no files in the file-array...)';
			}  else $content = 'Error: The datatransfer did not succeed. '.$fetchData;
		}  else $content = 'Error: Installation is not allowed in this path ('.$this->typePaths[$loc].')';

		$this->content.=$this->doc->section('Extension import results',$content,0,1);

		if ($uploadSucceed && $uploadedTempFile)	{
			t3lib_div::unlink_tempfile($uploadedTempFile);
		}

		return false;
	}
	function compare($aIn, $bIn) {
		$aParts = explode('.', $aIn, 2);
		$bParts = explode('.', $bIn, 2);
		$a = (int) $aParts[0];
		$b = (int) $bParts[0];
		if($a > $b){
			return 1;
		}elseif($a < $b){
			return -1;
		} else {
			if(is_string($aParts[1])) {
					return tx_t3s_library_terimport::compare($aParts[1], $bParts[1]);
			} else {
				return 0;
			}
		}
	}
}
if (defined("TYPO3_MODE") && $TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_terimport.php"])	{
	include_once($TYPO3_CONF_VARS[TYPO3_MODE]["XCLASS"]["ext/t3s/library/class.tx_t3s_library_terimport.php"]);
}

?>