<?php
if (!defined ('TYPO3_MODE'))     die ('Access denied.');
  require_once(t3lib_extMgm::extPath('t3s').'library/class.tx_t3s_library_configuration.php');
   require_once(t3lib_extMgm::extPath('t3s').'library/class.tx_t3s_library_css.php');
   require_once(t3lib_extMgm::extPath('t3s').'library/class.tx_t3s_library_cssimport.php');
   $_EXTCONF = @unserialize($_EXTCONF);
  if(($_GET['cacheCmd'] == 'temp_CACHED'||$_GET['cacheCmd'] == 'all') && !$_EXTCONF['cache']){
    $addConstants = chr(10).'config.baseURL='.t3lib_div::getIndpEnv('TYPO3_SITE_URL').chr(10);
    $addConstants .= $_EXTKEY.'EXTKEY=EXT:'.$_EXTKEY;
    $addSetup = '';
    tx_t3s_library_configuration::writeTempTS(t3lib_extMgm::extPath($_EXTKEY),
     'configuration/ts/includeTS.php',
     'temp/ts/',$addSetup,$addConstants);


    $tx_t3s_library_cssimport =  t3lib_div::makeInstance('tx_t3s_library_cssimport');
    $tx_t3s_library_cssimport->setExtKey($_EXTKEY);
    $tx_t3s_library_cssimport->setContentPath(PATH_site.'/typo3conf/ext/'.$_EXTKEY.'/resources');
    $tx_t3s_library_cssimport->setDestinationPath(PATH_site.'/typo3conf/ext/'.$_EXTKEY.'/temp/css');
    $tx_t3s_library_cssimport->main();
  }
  # tx_t3s_library_configuration::addTypoScriptDir(t3lib_extMgm::extPath($_EXTKEY).'configlibrary/',
  #                                'configlibrary/',
  #                                $_EXTKEY,
  #                                '');
  t3lib_extMgm::addStaticFile($_EXTKEY, 'temp/ts/', 'Sugar');

	#$TCA['sys_template']['columns']['include_static_file']['config']['size'] = 100;
	#$TCA['sys_template']['columns']['include_static_file']['config']['maxitems'] = 1000;


?>