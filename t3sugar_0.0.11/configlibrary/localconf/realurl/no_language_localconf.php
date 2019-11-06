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



// Activate script Hook, normaly already done in ext/realurl/ext_localconf.php
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tstemplate.php']['linkData-PostProc'][] =
    'EXT:realurl/class.tx_realurl.php:&tx_realurl->encodeSpURL';
$TYPO3_CONF_VARS['SC_OPTIONS']['tslib/class.tslib_fe.php']['checkAlternativeIdMethods-PostProc'][] =
    'EXT:realurl/class.tx_realurl.php:&tx_realurl->decodeSpURL';

// script Hook for clear all cache, normaly already done in ext/realurl/ext_localconf.php
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearAllCache_additionalTables']
   ['tx_realurl_urldecodecache'] = 'tx_realurl_urldecodecache';
$TYPO3_CONF_VARS['SC_OPTIONS']['t3lib/class.t3lib_tcemain.php']['clearAllCache_additionalTables']
   ['tx_realurl_urlencodecache'] = 'tx_realurl_urlencodecache';



$TYPO3_CONF_VARS['EXTCONF']['realurl']['_DEFAULT'] = array (
	'init' => array (
		'enableCHashCache'     => 1,
		'appendMissingSlash'   => 'ifNotFile',
		'enableUrlDecodeCache' => 1,
		'enableUrlEncodeCache' => 1,
    'respectSimulateStaticURLs' => 1,
	),
	'preVars' => array (
		array (
			'GETvar' => 'no_cache',
			'valueMap' => array (
				'no_cache' => 1,
			),
			'noMatch' => 'bypass',
		),
	),
	'fileName' => array (
		'defaultToHTMLsuffixOnPrev' => 0,
		'index' => array (
			'print' => array (
				'keyValues' => array (
					'type' => 98,
				)
			),
		),
	),
	'postVarSets' => array (
		'_DEFAULT' => array (
			'article' => array (
				array (
					'GETvar' => 'tx_ttnews[tt_news]',
				),
				array (
					'GETvar' => 'tx_ttnews[backPid]',
				),
			),
			'category' => array (
				array (
					'GETvar' => 'tx_ttnews[cat]',
				),
			),
			'neste' => array (
				array (
					'GETvar' => 'tx_ttnews[pointer]',
				),
			),
		),
	),
	'pagePath' => array (
		'type' => 'user',
		'userFunc' => 'EXT:realurl/class.tx_realurl_advanced.php:&tx_realurl_advanced->main',
		'spaceCharacter' => '-',
		'languageGetVar' => 'L',
		'expireDays' => 3,
		'rootpage_id' => 1,
	),
);

?>
