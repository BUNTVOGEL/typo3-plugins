<?php

namespace Infochy\Superfasttypo3\Tests\Unit\Domain\Model;

/***************************************************************
 *  Copyright notice
 *
 *  (c) 2016
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
 * Test case for class \Infochy\Superfasttypo3\Domain\Model\SuperFastTypo3.
 *
 * @copyright Copyright belongs to the respective authors
 * @license http://www.gnu.org/licenses/gpl.html GNU General Public License, version 3 or later
 *
 */
class SuperFastTypo3Test extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Infochy\Superfasttypo3\Domain\Model\SuperFastTypo3
     */
    protected $subject = NULL;

    public function setUp()
    {
        $this->subject = new \Infochy\Superfasttypo3\Domain\Model\SuperFastTypo3();
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
    public function getVersionReturnsInitialValueForString()
    {
        $this->assertSame(
            '',
            $this->subject->getVersion()
        );
    }

    /**
     * @test
     */
    public function setVersionForStringSetsVersion()
    {
        $this->subject->setVersion('Conceived at T3CON10');

        $this->assertAttributeEquals(
            'Conceived at T3CON10',
            'version',
            $this->subject
        );
    }
}
