<?php
namespace Infochy\InfochyHelper\Domain\Service;

use TYPO3\CMS\Extbase\DomainObject\DomainObjectInterface;

class FeUserAccessService implements \TYPO3\CMS\Core\SingletonInterface
{

    /**
     * @var \TYPO3\CMS\Extbase\Domain\Repository\FrontendUserRepository
     * @inject
     */
    protected $frontendUserRepository;

    /**
     * @return boolean
     */
    public function isFeUserAuthentificated()
    {
        return $this->getTypoScriptFrontendControllerController()->loginUser;
    }

    /**
     * @return FrontendUser
     */
    public function getFeUser()
    {
        return $this->frontendUserRepository->findByIdentifier($this->getTypoScriptFrontendControllerController()->fe_user->user['uid']);
    }


    /**
     * @return \TYPO3\CMS\Frontend\Controller\TypoScriptFrontendController
     */
    protected function getTypoScriptFrontendControllerController()
    {
        return $GLOBALS['TSFE'];
    }
}
