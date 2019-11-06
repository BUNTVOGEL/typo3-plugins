<?php
// SEE: tca_tx_infochyfeeditexample_domain_model_mydata.php
$falImageTcaConfig = array(
// Model Tabel
    'imageModelTableDb' => 'tx_infochyhelper_domain_model_mydata',
// Name in the Model
    'imagePropertyNameInModelHH' => 'image',
// Your ExtKey
    'extNameHH' => 'infochy_helper',
);
// add this to 'columns' array in TCA
$imagePropertyAndUser = array(


    $falImageTcaConfig['imagePropertyNameInModelHH'] => array(
        'exclude' => 0,
        'label' => 'Fal Image',
        'config' => \TYPO3\CMS\Core\Utility\ExtensionManagementUtility::getFileFieldTCAConfig(
            $falImageTcaConfig['imagePropertyNameInModelHH'],
            array(
                'appearance' => array(
                    'createNewRelationLinkTitle' => 'LLL:EXT:cms/locallang_ttc.xlf:images.addFileReference'
                ),
                'maxitems' => 1,
                'foreign_match_fields' => array(
                    'fieldname' => $falImageTcaConfig['imagePropertyNameInModelHH'],
                    'tablenames' => $falImageTcaConfig['imageModelTableDb'],
                    'table_local' => 'sys_file',
                ),
                'foreign_types' => array(
                    '0' => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_TEXT => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_IMAGE => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_AUDIO => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_VIDEO => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    ),
                    \TYPO3\CMS\Core\Resource\File::FILETYPE_APPLICATION => array(
                        'showitem' => '
							--palette--;LLL:EXT:lang/locallang_tca.xlf:sys_file_reference.imageoverlayPalette;imageoverlayPalette,
							--palette--;;filePalette'
                    )
                )
            ),
            $GLOBALS['TYPO3_CONF_VARS']['GFX']['imagefile_ext']
        ),
    ),

    'user' => array(
        'exclude' => 1,
        'label' => 'Fe User',
        'config' => array(
            'type' => 'inline',
            'foreign_table' => 'fe_users',
            'minitems' => 0,
            'maxitems' => 1,
            'appearance' => array(
                'collapseAll' => 0,
                'levelLinksPosition' => 'top',
                'showSynchronizationLink' => 1,
                'showPossibleLocalizationRecords' => 1,
                'showAllLocalizationLink' => 1
            ),
        ),
    ),

);


?>
