<?php
namespace Infochy\InfochyHelper\Controller;

/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2016
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
use Infochy\InfochyHelper\Property\TypeConverter\UploadedFileReferenceConverter;
use Infochy\InfochyHelper\Property\TypeConverter\HiddenRecordsObjectConverter;
use TYPO3\CMS\Extbase\Property\PropertyMappingConfiguration;

/**
 * BaseHelperController
 */
class BaseHelperController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    protected $modelObjNameCreateAction = 'newHelper';

    protected $modelObjNameUpdateAction = 'helper';

    protected $fileadminFolder = 'gg_helper';

    protected $actionNameOnAccessFailed = 'accessFailed';

    protected $imagePropertyNameInModel = 'image';

    protected $imagefileExt = 'gif,jpg,jpeg,png';

    protected $feUser = null;

    protected $actionGetRecord = array('showAction', 'showPublicAction', 'editAction', 'deleteAction');

    protected $actionModificationRecord = array('updateAction', 'disableAction', 'enableAction');

    protected $actionCreateRecord = array('createAction');

    protected $hiddenRecordsObjectConverter = 'Infochy\InfochyHelper\Property\TypeConverter\HiddenRecordsObjectConverter';
    /**
     * @var \Infochy\InfochyHelper\Domain\Service\FeUserAccessService
     * @inject
     */
    protected $feUserAccessService;

    /**
     * Action checkFeUserAccess
     *
     * @return void
     */
    public function checkFeUserAccess()
    {
        $this->feUser = $this->feUserAccessService->getFeUser();
        if (!$this->feUserAccessService->isFeUserAuthentificated()) {
            $this->redirect($this->actionNameOnAccessFailed);
        }
        $this->view->assign('feUser', $this->feUser);
    }

    protected function debug($mixedValue)
    {
        \TYPO3\CMS\Extbase\Utility\DebuggerUtility::var_dump($mixedValue);
    }

    public function initializeAction()
    {
        if (in_array($this->actionMethodName, $this->actionGetRecord)) {
            $this->setPropertyForGetRecord();
        } else if (in_array($this->actionMethodName, $this->actionCreateRecord)) {
            $this->setPropertyForCreateRecord();
        } else if (in_array($this->actionMethodName, $this->actionModificationRecord)) {
            $this->setPropertyForModificationRecord();
        }
    }

    protected function setPropertyForGetRecord()
    {
        if ($this->modelObjNameUpdateAction == 'helper') {
            print_r('BaseHelperController->setPropertyForGetRecord()-> Please SET $modelObjNameUpdateAction');
            die();
        }
        $this->allowPropertyHiddenRecords($this->modelObjNameUpdateAction);
    }

    protected function setPropertyForCreateRecord()
    {
        if ($this->modelObjNameCreateAction == 'newHelper') {
            print_r('BaseHelperController->setPropertyForCreateRecord()-> Please SET $modelObjNameCreateAction');
            die();
        }
        $this->allowPropertyHiddenRecords($this->modelObjNameCreateAction);
        $this->allowPropertyCreation($this->modelObjNameCreateAction);
        $this->setTypeConverterConfigurationForImageUpload($this->modelObjNameCreateAction);
    }

    protected function setPropertyForModificationRecord()
    {
        if ($this->modelObjNameUpdateAction == 'helper') {
            print_r('BaseHelperController->setPropertyForModificationRecord()-> Please SET $modelObjNameUpdateAction');
            die();
        }
        $this->allowPropertyHiddenRecords($this->modelObjNameUpdateAction);
        $this->allowPropertyModification($this->modelObjNameUpdateAction);
        $this->setTypeConverterConfigurationForImageUpload($this->modelObjNameUpdateAction);
    }

    protected function setTypeConverterConfigurationForImageUpload($argumentName)
    {
        if ($this->fileadminFolder == 'gg_helper') {
            print_r('BaseHelperController->setTypeConverterConfigurationForImageUpload()-> Please SET $fileadminFolder');
            die();
        }
        $uploadConfiguration = [
            UploadedFileReferenceConverter::CONFIGURATION_ALLOWED_FILE_EXTENSIONS => $this->imagefileExt,
            UploadedFileReferenceConverter::CONFIGURATION_UPLOAD_FOLDER => '1:/' . $this->fileadminFolder . '/',
        ];
        /** @var PropertyMappingConfiguration $newExampleConfiguration */
        $newExampleConfiguration = $this->arguments[$argumentName]->getPropertyMappingConfiguration();
        $newExampleConfiguration->forProperty($this->imagePropertyNameInModel)
            ->setTypeConverterOptions(
                'Infochy\\InfochyHelper\\Property\\TypeConverter\\UploadedFileReferenceConverter',
                $uploadConfiguration
            );
        //  $newExampleConfiguration->forProperty('imageCollection.0')
        //      ->setTypeConverterOptions(
        //          'Infochy\\InfochyHelper\\Property\\TypeConverter\\UploadedFileReferenceConverter',
        //          $uploadConfiguration
        //     );

    }

    /**
     * action accessFailed
     *
     * @return void
     */
    public function accessFailedAction()
    {
        print_r('BaseHelperController->accessFailedAction()-> Please SET $actionNameOnAccessFailed');
        die();
    }

    protected function allowPropertyHiddenRecords($objName)
    {
        $hiddenRecordsObjectConverter = $this->hiddenRecordsObjectConverter;
        $propertyMappingConfiguration = $this->arguments->getArgument($objName)->getPropertyMappingConfiguration();
        $propertyMappingConfiguration->setTypeConverterOptions(
            $hiddenRecordsObjectConverter,
            array(
                $hiddenRecordsObjectConverter::IGNORE_ENABLE_FIELDS_NAME => true,
                $hiddenRecordsObjectConverter::RESPECT_STORAGE_PAGE_NAME => false,
                $hiddenRecordsObjectConverter::RESPECT_SYS_LANGUAGE_NAME => false
            )
        );
    }

    protected function allowPropertyModification($objName)
    {
        $propertyMappingConfiguration = $this->arguments[$objName]->getPropertyMappingConfiguration();
        $propertyMappingConfiguration->allowAllProperties();
        $propertyMappingConfiguration->setTypeConverterOption('TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter',
            \TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter::CONFIGURATION_MODIFICATION_ALLOWED, TRUE);
    }

    protected function allowPropertyCreation($objName)
    {
        $propertyMappingConfiguration = $this->arguments[$objName]->getPropertyMappingConfiguration();
        $propertyMappingConfiguration->allowAllProperties();
        $propertyMappingConfiguration->setTypeConverterOption('TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter',
            \TYPO3\CMS\Extbase\Property\TypeConverter\PersistentObjectConverter::CONFIGURATION_CREATION_ALLOWED, TRUE);
    }

    protected function getFirstStoragePidFromFlexForm()
    {
        $pages = explode(',', $this->configurationManager->getContentObject()->data['pages']);
        return (int)$pages[0];
    }
}
