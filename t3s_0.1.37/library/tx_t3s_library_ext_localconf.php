<?php
if (!defined ('TYPO3_MODE')) 	die ('Access denied.');
  require_once(t3lib_extMgm::extPath('t3s').'library/class.tx_t3s_library_configuration.php');
  require_once(t3lib_extMgm::extPath('t3s').'library/class.tx_t3s_library_tsconfig.php');
  $_EXTCONF = @unserialize($_EXTCONF);

  if(!$_EXTCONF['setNoPageTSconfig'] && !$_EXTCONF['cache']){
  	if(($_GET['cacheCmd'] == 'temp_CACHED'||$_GET['cacheCmd'] == 'all') && !$_EXTCONF['cache']){
	    $t3s_library_tsconfig_tspage =  t3lib_div::makeInstance('tx_t3s_library_tsconfig');
	    $t3s_library_tsconfig_tspage->setExtKey($_EXTKEY);
	    $t3s_library_tsconfig_tspage->setContentPath(PATH_site.'/typo3conf/ext/'.$_EXTKEY.'/configlibrary/tspage');
	    $t3s_library_tsconfig_tspage->setDestinationPath(PATH_site.'/typo3conf/ext/'.$_EXTKEY.'/temp/tspage');
	    $t3s_library_tsconfig_tspage->setRelPath('/typo3conf/ext/'.$_EXTKEY.'/configlibrary/tspage/');
	    $t3s_library_tsconfig_tspage->setFilename('config.txt');
	    $t3s_library_tsconfig_tspage->main();
  	}
  	t3lib_extMgm::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/temp/tspage/config.txt">');
  }
  if(!$_EXTCONF['setNoUserTSconfig']){
  	if(($_GET['cacheCmd'] == 'temp_CACHED'||$_GET['cacheCmd'] == 'all') && !$_EXTCONF['cache']){
	    $t3s_library_tsconfig_tsuser =  t3lib_div::makeInstance('tx_t3s_library_tsconfig');
	    $t3s_library_tsconfig_tsuser->setExtKey($_EXTKEY);
	    $t3s_library_tsconfig_tsuser->setContentPath(PATH_site.'/typo3conf/ext/'.$_EXTKEY.'/configlibrary/tsuser');
	    $t3s_library_tsconfig_tsuser->setDestinationPath(PATH_site.'/typo3conf/ext/'.$_EXTKEY.'/temp/tsuser');
	    $t3s_library_tsconfig_tsuser->setRelPath('/typo3conf/ext/'.$_EXTKEY.'/configlibrary/tsuser/');
	    $t3s_library_tsconfig_tsuser->setFilename('config.txt');
	    $t3s_library_tsconfig_tsuser->main();
  	}
  	t3lib_extMgm::addPageTSConfig('<INCLUDE_TYPOSCRIPT: source="FILE:EXT:' . $_EXTKEY . '/temp/tsuser/config.txt">');
  }
  if(!$_EXTCONF['setNoLocalconf']){
	  tx_t3s_library_configuration::addLocalconfDir(t3lib_extMgm::extPath($_EXTKEY).'configlibrary/localconf/',$pathArray);
	  foreach((array) $pathArray as $pathLocalconf){
	    require_once($pathLocalconf);
	  }
  }


?>