<?php
namespace Infochy\InfochyFeeditexample\Controller;

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
/**
 * MyDataController
 */
class MyDataController extends BaseMyDataController
{
    /**
     * myDataRepository
     *
     * @var \Infochy\InfochyFeeditexample\Domain\Repository\MyDataRepository
     * @inject
     */
    protected $myDataRepository = NULL;

    /**
     * action list
     *
     * @param Infochy\InfochyFeeditexample\Domain\Model\MyData
     * @return void
     */
    public function listAction()
    {
        $this->checkFeUserAccess();
        $this->myDataRepository->setStoragePageIdAndIgnoreEnableFields($this->getFirstStoragePidFromFlexForm());
        $myDatas = $this->myDataRepository->findByUser($this->feUser);
        $this->view->assign('myDatas', $myDatas);
    }

    /**
     * action new
     *
     * @param Infochy\InfochyFeeditexample\Domain\Model\MyData
     * @return void
     */
    public function newAction()
    {
        $this->checkFeUserAccess();
    }

    /**
     * action create
     *
     * @param Infochy\InfochyFeeditexample\Domain\Model\MyData
     * @return void
     */
    public function createAction(\Infochy\InfochyFeeditexample\Domain\Model\MyData $newMyData)
    {
        $this->checkFeUserAccess();
        $this->addFlashMessage($this->actionMethodName, '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $newMyData->setUser($this->feUser);
        $newMyData->setHidden(TRUE);
        $this->myDataRepository->setStoragePageIdAndIgnoreEnableFields($this->getFirstStoragePidFromFlexForm());
        $this->myDataRepository->add($newMyData);
        $this->myDataRepository->persistAll();
        $myData = $this->myDataRepository->findByUid($newMyData->getUid());
        $this->redirect('show', NULL, NULL, array('myData' => $myData));
    }

    /**
     * action edit
     *
     * @param Infochy\InfochyFeeditexample\Domain\Model\MyData
     * @ignorevalidation $myData
     * @return void
     */
    public function editAction(\Infochy\InfochyFeeditexample\Domain\Model\MyData $myData)
    {
        $this->checkFeUserAccess();
        $this->view->assign('myData', $myData);
    }

    /**
     * action update
     *
     * @param Infochy\InfochyFeeditexample\Domain\Model\MyData
     * @return void
     */
    public function updateAction(\Infochy\InfochyFeeditexample\Domain\Model\MyData $myData)
    {
        $this->modifyRecord($myData);
    }

    /**
     * action disable
     *
     * @param Infochy\InfochyFeeditexample\Domain\Model\MyData
     * @ignorevalidation $myData
     * @return void
     */
    public function disableAction(\Infochy\InfochyFeeditexample\Domain\Model\MyData $myData)
    {
        $this->modifyRecord($myData, TRUE);
    }

    /**
     * action enable
     *
     * @param Infochy\InfochyFeeditexample\Domain\Model\MyData
     * @ignorevalidation $myData
     * @return void
     */
    public function enableAction(\Infochy\InfochyFeeditexample\Domain\Model\MyData $myData)
    {
        $this->modifyRecord($myData);
    }

    protected function modifyRecord($myData, $hidden = FALSE)
    {
        $this->checkFeUserAccess();
        $this->addFlashMessage($this->actionMethodName, '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->myDataRepository->setStoragePageIdAndIgnoreEnableFields($this->getFirstStoragePidFromFlexForm());
        $myData->setHidden($hidden);
        $this->myDataRepository->update($myData);
        $this->redirect('show', NULL, NULL, array('myData' => $myData));
    }

    /**
     * action delete
     *
     * @param Infochy\InfochyFeeditexample\Domain\Model\MyData
     * @ignorevalidation $myData
     * @return void
     */
    public function deleteAction(\Infochy\InfochyFeeditexample\Domain\Model\MyData $myData)
    {
        $this->checkFeUserAccess();
        $this->addFlashMessage($this->actionMethodName, '', \TYPO3\CMS\Core\Messaging\AbstractMessage::ERROR);
        $this->myDataRepository->setStoragePageIdAndIgnoreEnableFields($this->getFirstStoragePidFromFlexForm());
        $myData->setHidden(TRUE);
        $this->myDataRepository->remove($myData);
        $this->redirect('list');
    }

    /**
     * action showPublic
     *
     * @param Infochy\InfochyFeeditexample\Domain\Model\MyData
     * @ignorevalidation $myData
     * @return void
     */
    public function showPublicAction(\Infochy\InfochyFeeditexample\Domain\Model\MyData $myData)
    {
        $this->view->assign('myData', $myData);
    }

    /**
     * action show
     *
     * @param Infochy\InfochyFeeditexample\Domain\Model\MyData
     * @ignorevalidation $myData
     * @return void
     */
    public function showAction(\Infochy\InfochyFeeditexample\Domain\Model\MyData $myData)
    {
        $this->checkFeUserAccess();
        $this->view->assign('myData', $myData);
    }

    /**
     * action listPublic
     *
     * @param Infochy\InfochyFeeditexample\Domain\Model\MyData
     * @return void
     */
    public function listPublicAction()
    {
        $this->myDataRepository->setStoragePageId($this->getFirstStoragePidFromFlexForm());
        $myDatas = $this->myDataRepository->findAll();
        $this->view->assign('myDatas', $myDatas);
    }

    /**
     * action logout
     *
     * @return void
     */
    public function logoutAction()
    {

    }
}
