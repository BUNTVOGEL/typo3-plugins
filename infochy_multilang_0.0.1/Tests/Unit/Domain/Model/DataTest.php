<?php
namespace Infochy\InfochyMultilang\Tests\Unit\Domain\Model;

/**
 * Test case.
 *
 * @author Micha Barthel <mb@infochy.de>
 */
class DataTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Infochy\InfochyMultilang\Domain\Model\Data
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = new \Infochy\InfochyMultilang\Domain\Model\Data();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function getTitleReturnsInitialValueForString()
    {
        self::assertSame(
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

        self::assertAttributeEquals(
            'Conceived at T3CON10',
            'title',
            $this->subject
        );

    }
}
