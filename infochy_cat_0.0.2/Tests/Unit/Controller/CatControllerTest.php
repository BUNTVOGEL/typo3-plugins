<?php
namespace Infochy\InfochyCat\Tests\Unit\Controller;
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
 * Test case for class Infochy\InfochyCat\Controller\CatController.
 *
 * @author Micha Barthel <mb@infochy.de>
 */
class CatControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{

	/**
	 * @var \Infochy\InfochyCat\Controller\CatController
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = $this->getMock('Infochy\\InfochyCat\\Controller\\CatController', array('redirect', 'forward', 'addFlashMessage'), array(), '', FALSE);
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function listActionFetchesAllCatsFromRepositoryAndAssignsThemToView()
	{

		$allCats = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array(), array(), '', FALSE);

		$catRepository = $this->getMock('Infochy\\InfochyCat\\Domain\\Repository\\CatRepository', array('findAll'), array(), '', FALSE);
		$catRepository->expects($this->once())->method('findAll')->will($this->returnValue($allCats));
		$this->inject($this->subject, 'catRepository', $catRepository);

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$view->expects($this->once())->method('assign')->with('cats', $allCats);
		$this->inject($this->subject, 'view', $view);

		$this->subject->listAction();
	}

	/**
	 * @test
	 */
	public function showActionAssignsTheGivenCatToView()
	{
		$cat = new \Infochy\InfochyCat\Domain\Model\Cat();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('cat', $cat);

		$this->subject->showAction($cat);
	}

	/**
	 * @test
	 */
	public function createActionAddsTheGivenCatToCatRepository()
	{
		$cat = new \Infochy\InfochyCat\Domain\Model\Cat();

		$catRepository = $this->getMock('Infochy\\InfochyCat\\Domain\\Repository\\CatRepository', array('add'), array(), '', FALSE);
		$catRepository->expects($this->once())->method('add')->with($cat);
		$this->inject($this->subject, 'catRepository', $catRepository);

		$this->subject->createAction($cat);
	}

	/**
	 * @test
	 */
	public function editActionAssignsTheGivenCatToView()
	{
		$cat = new \Infochy\InfochyCat\Domain\Model\Cat();

		$view = $this->getMock('TYPO3\\CMS\\Extbase\\Mvc\\View\\ViewInterface');
		$this->inject($this->subject, 'view', $view);
		$view->expects($this->once())->method('assign')->with('cat', $cat);

		$this->subject->editAction($cat);
	}

	/**
	 * @test
	 */
	public function updateActionUpdatesTheGivenCatInCatRepository()
	{
		$cat = new \Infochy\InfochyCat\Domain\Model\Cat();

		$catRepository = $this->getMock('Infochy\\InfochyCat\\Domain\\Repository\\CatRepository', array('update'), array(), '', FALSE);
		$catRepository->expects($this->once())->method('update')->with($cat);
		$this->inject($this->subject, 'catRepository', $catRepository);

		$this->subject->updateAction($cat);
	}

	/**
	 * @test
	 */
	public function deleteActionRemovesTheGivenCatFromCatRepository()
	{
		$cat = new \Infochy\InfochyCat\Domain\Model\Cat();

		$catRepository = $this->getMock('Infochy\\InfochyCat\\Domain\\Repository\\CatRepository', array('remove'), array(), '', FALSE);
		$catRepository->expects($this->once())->method('remove')->with($cat);
		$this->inject($this->subject, 'catRepository', $catRepository);

		$this->subject->deleteAction($cat);
	}
}
