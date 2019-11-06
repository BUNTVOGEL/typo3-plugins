<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
    {

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
            'Infochy.InfochyMultilang',
            'Model',
            'Extbase Multilanguage'
        );

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($extKey, 'Configuration/TypoScript', 'Extbase Multilanguage');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addLLrefForTCAdescr('tx_infochymultilang_domain_model_data', 'EXT:infochy_multilang/Resources/Private/Language/locallang_csh_tx_infochymultilang_domain_model_data.xlf');
        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::allowTableOnStandardPages('tx_infochymultilang_domain_model_data');

        \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::makeCategorizable(
            $extKey,
            'tx_infochymultilang_domain_model_data'
        );

    },
    $_EXTKEY
);
