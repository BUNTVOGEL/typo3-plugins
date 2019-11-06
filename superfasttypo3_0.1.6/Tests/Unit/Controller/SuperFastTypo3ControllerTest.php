<?php
namespace Infochy\Superfasttypo3\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016
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
 * Test case for class Infochy\Superfasttypo3\Controller\SuperFastTypo3Controller.
 *
 */
class SuperFastTypo3ControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

    /**
     * @var \Infochy\Superfasttypo3\Controller\SuperFastTypo3Controller
     */
    protected $subject = NULL;

    public function setUp()
    {
        $this->subject = $this->getMock('Infochy\\Superfasttypo3\\Controller\\SuperFastTypo3Controller', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
    }

    public function tearDown()
    {
        unset($this->subject);
    }

    /**
     * @test
     */
    public function listActionFetchesAllSuperFastTypo3sFromRepositoryAndAssignsThemToView()
    {

        $allSuperFastTypo3s = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

        $superFastTypo3Repository = $this->getMock('Infochy\\Superfasttypo3\\Domain\\Repository\\SuperFastTypo3Repository', array('findAll'), array(), '', FALSE);
        $superFastTypo3Repository->expects($this->once())->method('findAll')->will($this->returnValue($allSuperFastTypo3s));
        $this->inject($this->subject, 'superFastTypo3Repository', $superFastTypo3Repository);

        $view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
        $view->expects($this->once())->method('assign')->with('superFastTypo3s', $allSuperFastTypo3s);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenSuperFastTypo3ToView()
    {
        $superFastTypo3 = new \Infochy\Superfasttypo3\Domain\Model\SuperFastTypo3();

        $view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
        $this->inject($this->subject, 'view', $view);
        $view->expects($this->once())->method('assign')->with('superFastTypo3', $superFastTypo3);

        $this->subject->showAction($superFastTypo3);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenSuperFastTypo3ToSuperFastTypo3Repository()
    {
        $superFastTypo3 = new \Infochy\Superfasttypo3\Domain\Model\SuperFastTypo3();

        $superFastTypo3Repository = $this->getMock('Infochy\\Superfasttypo3\\Domain\\Repository\\SuperFastTypo3Repository', array('add'), array(), '', FALSE);
        $superFastTypo3Repository->expects($this->once())->method('add')->with($superFastTypo3);
        $this->inject($this->subject, 'superFastTypo3Repository', $superFastTypo3Repository);

        $this->subject->createAction($superFastTypo3);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenSuperFastTypo3ToView()
    {
        $superFastTypo3 = new \Infochy\Superfasttypo3\Domain\Model\SuperFastTypo3();

        $view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
        $this->inject($this->subject, 'view', $view);
        $view->expects($this->once())->method('assign')->with('superFastTypo3', $superFastTypo3);

        $this->subject->editAction($superFastTypo3);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenSuperFastTypo3InSuperFastTypo3Repository()
    {
        $superFastTypo3 = new \Infochy\Superfasttypo3\Domain\Model\SuperFastTypo3();

        $superFastTypo3Repository = $this->getMock('Infochy\\Superfasttypo3\\Domain\\Repository\\SuperFastTypo3Repository', array('update'), array(), '', FALSE);
        $superFastTypo3Repository->expects($this->once())->method('update')->with($superFastTypo3);
        $this->inject($this->subject, 'superFastTypo3Repository', $superFastTypo3Repository);

        $this->subject->updateAction($superFastTypo3);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenSuperFastTypo3FromSuperFastTypo3Repository()
    {
        $superFastTypo3 = new \Infochy\Superfasttypo3\Domain\Model\SuperFastTypo3();

        $superFastTypo3Repository = $this->getMock('Infochy\\Superfasttypo3\\Domain\\Repository\\SuperFastTypo3Repository', array('remove'), array(), '', FALSE);
        $superFastTypo3Repository->expects($this->once())->method('remove')->with($superFastTypo3);
        $this->inject($this->subject, 'superFastTypo3Repository', $superFastTypo3Repository);

        $this->subject->deleteAction($superFastTypo3);
    }
}
