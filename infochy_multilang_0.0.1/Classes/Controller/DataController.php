<?php
namespace Infochy\InfochyMultilang\Controller;

/***
 *
 * This file is part of the "Extbase Multilanguage" Extension for TYPO3 CMS.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 *  (c) 2017 Micha Barthel <mb@infochy.de>, infochy
 *
 ***/

/**
 * DataController
 */
class DataController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * dataRepository
     *
     * @var \Infochy\InfochyMultilang\Domain\Repository\DataRepository
     * @inject
     */
    protected $dataRepository = null;

    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $datas = $this->dataRepository->findAll();
        $this->view->assign('datas', $datas);
    }

    /**
     * action show
     *
     * @param \Infochy\InfochyMultilang\Domain\Model\Data $data
     * @return void
     */
    public function showAction(\Infochy\InfochyMultilang\Domain\Model\Data $data)
    {
        $this->view->assign('data', $data);
    }

    /**
     * action new
     *
     * @return void
     */
    public function newAction()
    {

    }

    /**
     * action create
     *
     * @param \Infochy\InfochyMultilang\Domain\Model\Data $newData
     * @return void
     */
    public function createAction(\Infochy\InfochyMultilang\Domain\Model\Data $newData)
    {
        $this->addFlashMessage('The object was created. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->dataRepository->add($newData);
        $this->redirect('list');
    }

    /**
     * action edit
     *
     * @param \Infochy\InfochyMultilang\Domain\Model\Data $data
     * @ignorevalidation $data
     * @return void
     */
    public function editAction(\Infochy\InfochyMultilang\Domain\Model\Data $data)
    {
        $this->view->assign('data', $data);
    }

    /**
     * action update
     *
     * @param \Infochy\InfochyMultilang\Domain\Model\Data $data
     * @return void
     */
    public function updateAction(\Infochy\InfochyMultilang\Domain\Model\Data $data)
    {
        $this->addFlashMessage('The object was updated. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->dataRepository->update($data);
        $this->redirect('list');
    }

    /**
     * action delete
     *
     * @param \Infochy\InfochyMultilang\Domain\Model\Data $data
     * @return void
     */
    public function deleteAction(\Infochy\InfochyMultilang\Domain\Model\Data $data)
    {
        $this->addFlashMessage('The object was deleted. Please be aware that this action is publicly accessible unless you implement an access check. See https://docs.typo3.org/typo3cms/extensions/extension_builder/User/Index.html', '', \TYPO3\CMS\Core\Messaging\AbstractMessage::WARNING);
        $this->dataRepository->remove($data);
        $this->redirect('list');
    }
}
