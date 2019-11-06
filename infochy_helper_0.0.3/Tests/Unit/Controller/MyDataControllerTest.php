<?php
namespace Infochy\InfochyHelper\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016 Micha Barthel , http://php-blogger.infochy.de/
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 2 of the License, or
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
 * Test case for class Infochy\InfochyHelper\Controller\MyDataController.
 *
 * @author Micha Barthel
 */
class MyDataControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

    /**
     * @var \Infochy\InfochyHelper\Controller\MyDataController
     */
    protected $subject = NULL;

    public function setUp()
    {
        $this->subject = $this->getMock('Infochy\\InfochyHelper\\Controller\\MyDataController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
    }

    public function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function listActionFetchesAllMyDatasFromRepositoryAndAssignsThemToView()
    {

        $allMyDatas = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

        $myDataRepository = $this->getMock('Infochy\\InfochyHelper\\Domain\\Repository\\MyDataRepository', array('findAll'), array(), '', FALSE);
        $myDataRepository->expects($this->once())->method('findAll')->will($this->returnValue($allMyDatas));
        $this->inject($this->subject, 'myDataRepository', $myDataRepository);

        $view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
        $view->expects($this->once())->method('assign')->with('myDatas', $allMyDatas);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenMyDataToView()
    {
        $myData = new \Infochy\InfochyHelper\Domain\Model\MyData();

        $view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
        $this->inject($this->subject, 'view', $view);
        $view->expects($this->once())->method('assign')->with('myData', $myData);

        $this->subject->showAction($myData);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenMyDataToMyDataRepository()
    {
        $myData = new \Infochy\InfochyHelper\Domain\Model\MyData();

        $myDataRepository = $this->getMock('Infochy\\InfochyHelper\\Domain\\Repository\\MyDataRepository', array('add'), array(), '', FALSE);
        $myDataRepository->expects($this->once())->method('add')->with($myData);
        $this->inject($this->subject, 'myDataRepository', $myDataRepository);

        $this->subject->createAction($myData);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenMyDataToView()
    {
        $myData = new \Infochy\InfochyHelper\Domain\Model\MyData();

        $view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
        $this->inject($this->subject, 'view', $view);
        $view->expects($this->once())->method('assign')->with('myData', $myData);

        $this->subject->editAction($myData);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenMyDataInMyDataRepository()
    {
        $myData = new \Infochy\InfochyHelper\Domain\Model\MyData();

        $myDataRepository = $this->getMock('Infochy\\InfochyHelper\\Domain\\Repository\\MyDataRepository', array('update'), array(), '', FALSE);
        $myDataRepository->expects($this->once())->method('update')->with($myData);
        $this->inject($this->subject, 'myDataRepository', $myDataRepository);

        $this->subject->updateAction($myData);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenMyDataFromMyDataRepository()
    {
        $myData = new \Infochy\InfochyHelper\Domain\Model\MyData();

        $myDataRepository = $this->getMock('Infochy\\InfochyHelper\\Domain\\Repository\\MyDataRepository', array('remove'), array(), '', FALSE);
        $myDataRepository->expects($this->once())->method('remove')->with($myData);
        $this->inject($this->subject, 'myDataRepository', $myDataRepository);

        $this->subject->deleteAction($myData);
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenMyDataToView()
    {
        $myData = new \Infochy\InfochyHelper\Domain\Model\MyData();

        $view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
        $this->inject($this->subject, 'view', $view);
        $view->expects($this->once())->method('assign')->with('myData', $myData);

        $this->subject->showAction($myData);
    }

    /**
     * @test
     */
    public function listActionFetchesAllMyDatasFromRepositoryAndAssignsThemToView()
    {

        $allMyDatas = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

        $myDataRepository = $this->getMock('Infochy\\InfochyHelper\\Domain\\Repository\\MyDataRepository', array('findAll'), array(), '', FALSE);
        $myDataRepository->expects($this->once())->method('findAll')->will($this->returnValue($allMyDatas));
        $this->inject($this->subject, 'myDataRepository', $myDataRepository);

        $view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
        $view->expects($this->once())->method('assign')->with('myDatas', $allMyDatas);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }
}
