<?php

namespace Infochy\InfochyMm\Tests\Unit\Domain\Model;

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
 * Test case for class \Infochy\InfochyMm\Domain\Model\Data.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 * @author Micha Barthel <mb@infochy.de>
 */
class DataTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
	/**
	 * @var \Infochy\InfochyMm\Domain\Model\Data
	 */
	protected $subject = NULL;

	public function setUp()
	{
		$this->subject = new \Infochy\InfochyMm\Domain\Model\Data();
	}

	public function tearDown()
	{
		unset($this->subject);
	}

	/**
	 * @test
	 */
	public function getTitleReturnsInitialValueForString()
	{
		$this->assertSame(
			'',
			$this->subject->getTitle()
		);
	}

	/**
	 * @test
	 */
	public function setTitleForStringSetsTitle()
	{
		$this->subject->setTitle('Conceived at T3CON10');

		$this->assertAttributeEquals(
			'Conceived at T3CON10',
			'title',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function getContentReturnsInitialValueForContent()
	{
		$newObjectStorage = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$this->assertEquals(
			$newObjectStorage,
			$this->subject->getContent()
		);
	}

	/**
	 * @test
	 */
	public function setContentForObjectStorageContainingContentSetsContent()
	{
		$content = new \Infochy\InfochyMm\Domain\Model\Content();
		$objectStorageHoldingExactlyOneContent = new \TYPO3\CMS\Extbase\Persistence\ObjectStorage();
		$objectStorageHoldingExactlyOneContent->attach($content);
		$this->subject->setContent($objectStorageHoldingExactlyOneContent);

		$this->assertAttributeEquals(
			$objectStorageHoldingExactlyOneContent,
			'content',
			$this->subject
		);
	}

	/**
	 * @test
	 */
	public function addContentToObjectStorageHoldingContent()
	{
		$content = new \Infochy\InfochyMm\Domain\Model\Content();
		$contentObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('attach'), array(), '', FALSE);
		$contentObjectStorageMock->expects($this->once())->method('attach')->with($this->equalTo($content));
		$this->inject($this->subject, 'content', $contentObjectStorageMock);

		$this->subject->addContent($content);
	}

	/**
	 * @test
	 */
	public function removeContentFromObjectStorageHoldingContent()
	{
		$content = new \Infochy\InfochyMm\Domain\Model\Content();
		$contentObjectStorageMock = $this->getMock('TYPO3\\CMS\\Extbase\\Persistence\\ObjectStorage', array('detach'), array(), '', FALSE);
		$contentObjectStorageMock->expects($this->once())->method('detach')->with($this->equalTo($content));
		$this->inject($this->subject, 'content', $contentObjectStorageMock);

		$this->subject->removeContent($content);

	}
}
