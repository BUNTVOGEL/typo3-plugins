<?php
if (!defined('TYPO3_MODE')) {
	die('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	'Infochy.' . $_EXTKEY,
	'Plugin',
	'Plugin Extbase MM-Relation Example '
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'Extbase MM-Relation Example');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_infochymm_domain_model_data', 'EXT:infochy_mm/Resources/Private/Language/locallang_csh_tx_infochymm_domain_model_data.xlf');
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_infochymm_domain_model_data');

