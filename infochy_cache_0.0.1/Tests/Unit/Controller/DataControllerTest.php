<?php
namespace Infochy\InfochyCache\Tests\Unit\Controller;
/***************************************************************
 *  Copyright notice
 *
 *  (c) 2017 Micha Barthel <mb@infochy.de>, infochy
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
 * Test case for class Infochy\InfochyCache\Controller\DataController.
 *
 * @author Micha Barthel <mb@infochy.de>
 */
class DataControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Infochy\InfochyCache\Controller\DataController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Infochy\\InfochyCache\\Controller\\DataController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllDatasFromRepositoryAndAssignsThemToView()
	{

		$allDatas = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$dataRepository = $this->getMock('Infochy\\InfochyCache\\Domain\\Repository\\DataRepository', array('findAll'), array(), '', FALSE);
		$dataRepository->expects($this->once())->method('findAll')->will($this->returnValue($allDatas));
		$this->inject($this->subject, 'dataRepository', $dataRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('datas', $allDatas);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenDataToView()
	{
		$data = new \Infochy\InfochyCache\Domain\Model\Data();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('data', $data);

		$this->subject->showAction($data);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenDataToDataRepository()
	{
		$data = new \Infochy\InfochyCache\Domain\Model\Data();

		$dataRepository = $this->getMock('Infochy\\InfochyCache\\Domain\\Repository\\DataRepository', array('add'), array(), '', FALSE);
		$dataRepository->expects($this->once())->method('add')->with($data);
		$this->inject($this->subject, 'dataRepository', $dataRepository);

		$this->subject->createAction($data);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenDataToView()
	{
		$data = new \Infochy\InfochyCache\Domain\Model\Data();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('data', $data);

		$this->subject->editAction($data);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenDataInDataRepository()
	{
		$data = new \Infochy\InfochyCache\Domain\Model\Data();

		$dataRepository = $this->getMock('Infochy\\InfochyCache\\Domain\\Repository\\DataRepository', array('update'), array(), '', FALSE);
		$dataRepository->expects($this->once())->method('update')->with($data);
		$this->inject($this->subject, 'dataRepository', $dataRepository);

		$this->subject->updateAction($data);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenDataFromDataRepository()
	{
		$data = new \Infochy\InfochyCache\Domain\Model\Data();

		$dataRepository = $this->getMock('Infochy\\InfochyCache\\Domain\\Repository\\DataRepository', array('remove'), array(), '', FALSE);
		$dataRepository->expects($this->once())->method('remove')->with($data);
		$this->inject($this->subject, 'dataRepository', $dataRepository);

		$this->subject->deleteAction($data);
	}
}
