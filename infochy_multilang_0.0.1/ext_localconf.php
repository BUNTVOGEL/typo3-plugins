<?php
defined('TYPO3_MODE') || die('Access denied.');

call_user_func(
    function($extKey)
	{

        \TYPO3\CMS\Extbase\Utility\ExtensionUtility::configurePlugin(
            'Infochy.InfochyMultilang',
            'Model',
            [
                'Data' => 'list, show, new, create, edit, update, delete'
            ],
            // non-cacheable actions
            [
                'Data' => 'create, update, delete'
            ]
        );

	// wizards
	\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
		'mod {
			wizards.newContentElement.wizardItems.plugins {
				elements {
					model {
						icon = ' . \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extRelPath($extKey) . 'Resources/Public/Icons/user_plugin_model.svg
						title = LLL:EXT:infochy_multilang/Resources/Private/Language/locallang_db.xlf:tx_infochy_multilang_domain_model_model
						description = LLL:EXT:infochy_multilang/Resources/Private/Language/locallang_db.xlf:tx_infochy_multilang_domain_model_model.description
						tt_content_defValues {
							CType = list
							list_type = infochymultilang_model
						}
					}
				}
				show = *
			}
	   }'
	);
    },
    $_EXTKEY
);
