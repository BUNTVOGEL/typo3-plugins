<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Infochy.' . $_EXTKEY,
	'Plugin',
	array(
		'Data' => 'plugin',
		
	),
	// non-cacheable actions
	array(
		'Data' => 'plugin',
		
	)
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
	'Infochy.' . $_EXTKEY,
	'Cobject',
	array(
		'Data' => 'cobject',
		
	),
	// non-cacheable actions
	array(
		'Data' => 'cobject',
		
	)
);
