<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Infochy.' . $_EXTKEY,
	'Fluid',
	'Extbase Sub-Cache Fluid Example '
);

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Infochy.' . $_EXTKEY,
	'Model',
	'Extbase Sub-Cache Model Example '
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Extbase Sub-Cache Example');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_infochycache_domain_model_data', 'EXT:infochy_cache/Resources/Private/Language/locallang_csh_tx_infochycache_domain_model_data.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_infochycache_domain_model_data');
