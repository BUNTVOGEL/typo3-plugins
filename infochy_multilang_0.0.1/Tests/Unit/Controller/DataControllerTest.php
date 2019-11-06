<?php
namespace Infochy\InfochyMultilang\Tests\Unit\Controller;

/**
 * Test case.
 *
 * @author Micha Barthel <mb@infochy.de>
 */
class DataControllerTest extends \TYPO3\CMS\Core\Tests\UnitTestCase
{
    /**
     * @var \Infochy\InfochyMultilang\Controller\DataController
     */
    protected $subject = null;

    protected function setUp()
    {
        parent::setUp();
        $this->subject = $this->getMockBuilder(\Infochy\InfochyMultilang\Controller\DataController::class)
            ->setMethods(['redirect', 'forward', 'addFlashMessage'])
            ->disableOriginalConstructor()
            ->getMock();
    }

    protected function tearDown()
    {
        parent::tearDown();
    }

    /**
     * @test
     */
    public function listActionFetchesAllDatasFromRepositoryAndAssignsThemToView()
    {

        $allDatas = $this->getMockBuilder(\TYPO3\CMS\Extbase\Persistence\ObjectStorage::class)
            ->disableOriginalConstructor()
            ->getMock();

        $dataRepository = $this->getMockBuilder(\Infochy\InfochyMultilang\Domain\Repository\DataRepository::class)
            ->setMethods(['findAll'])
            ->disableOriginalConstructor()
            ->getMock();
        $dataRepository->expects(self::once())->method('findAll')->will(self::returnValue($allDatas));
        $this->inject($this->subject, 'dataRepository', $dataRepository);

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $view->expects(self::once())->method('assign')->with('datas', $allDatas);
        $this->inject($this->subject, 'view', $view);

        $this->subject->listAction();
    }

    /**
     * @test
     */
    public function showActionAssignsTheGivenDataToView()
    {
        $data = new \Infochy\InfochyMultilang\Domain\Model\Data();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('data', $data);

        $this->subject->showAction($data);
    }

    /**
     * @test
     */
    public function createActionAddsTheGivenDataToDataRepository()
    {
        $data = new \Infochy\InfochyMultilang\Domain\Model\Data();

        $dataRepository = $this->getMockBuilder(\Infochy\InfochyMultilang\Domain\Repository\DataRepository::class)
            ->setMethods(['add'])
            ->disableOriginalConstructor()
            ->getMock();

        $dataRepository->expects(self::once())->method('add')->with($data);
        $this->inject($this->subject, 'dataRepository', $dataRepository);

        $this->subject->createAction($data);
    }

    /**
     * @test
     */
    public function editActionAssignsTheGivenDataToView()
    {
        $data = new \Infochy\InfochyMultilang\Domain\Model\Data();

        $view = $this->getMockBuilder(\TYPO3\CMS\Extbase\Mvc\View\ViewInterface::class)->getMock();
        $this->inject($this->subject, 'view', $view);
        $view->expects(self::once())->method('assign')->with('data', $data);

        $this->subject->editAction($data);
    }

    /**
     * @test
     */
    public function updateActionUpdatesTheGivenDataInDataRepository()
    {
        $data = new \Infochy\InfochyMultilang\Domain\Model\Data();

        $dataRepository = $this->getMockBuilder(\Infochy\InfochyMultilang\Domain\Repository\DataRepository::class)
            ->setMethods(['update'])
            ->disableOriginalConstructor()
            ->getMock();

        $dataRepository->expects(self::once())->method('update')->with($data);
        $this->inject($this->subject, 'dataRepository', $dataRepository);

        $this->subject->updateAction($data);
    }

    /**
     * @test
     */
    public function deleteActionRemovesTheGivenDataFromDataRepository()
    {
        $data = new \Infochy\InfochyMultilang\Domain\Model\Data();

        $dataRepository = $this->getMockBuilder(\Infochy\InfochyMultilang\Domain\Repository\DataRepository::class)
            ->setMethods(['remove'])
            ->disableOriginalConstructor()
            ->getMock();

        $dataRepository->expects(self::once())->method('remove')->with($data);
        $this->inject($this->subject, 'dataRepository', $dataRepository);

        $this->subject->deleteAction($data);
    }
}
