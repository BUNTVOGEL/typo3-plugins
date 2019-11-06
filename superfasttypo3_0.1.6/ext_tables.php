<?php
if (!defined('TYPO3_MODE')) {
    die('Access denied.');
}

if (TYPO3_MODE === 'BE') {

    /**
     * Registers a Backend Module
     */
    \TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerModule(
        'Infochy.' . $_EXTKEY,
        'tools',     // Make module a submodule of 'tools'
        'superfasttypo3',    // Submodule key
        '',                        // Position
        array(
            'SuperFastTypo3' => 'list, show, new, create, edit, update, delete, status, install, runinstaller, zip, uploadzip, upload, deactivate, activate',
        ),
        array(
            'access' => 'user,group',
            'icon' => 'EXT:' . $_EXTKEY . '/Resources/Public/Icons/module-extensionmanager.svg',
            'labels' => 'LLL:EXT:' . $_EXTKEY . '/Resources/Private/Language/locallang_superfasttypo3.xlf',
        )
    );

}
