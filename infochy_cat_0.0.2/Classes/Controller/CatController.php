<?php
namespace Infochy\InfochyCat\Controller;


/***************************************************************
 *
 *  Copyright notice
 *
 *  (c) 2017 Micha Barthel <mb@infochy.de>, infochy
 *
 *  All rights reserved
 *
 *  This script is part of the TYPO3 project. The TYPO3 project is
 *  free software; you can redistribute it and/or modify
 *  it under the terms of the GNU General Public License as published by
 *  the Free Software Foundation; either version 3 of the License, or
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
 * CatController
 */
class CatController extends \TYPO3\CMS\Extbase\Mvc\Controller\ActionController
{
    /**
     * catRepository
     *
     * @var \Infochy\InfochyCat\Domain\Repository\CategoryRepository
     * @inject
     */
    protected $categoryRepository = NULL;
    /**
     * catRepository
     *
     * @var \Infochy\InfochyCat\Domain\Repository\CatRepository
     * @inject
     */
    protected $catRepository = NULL;
    
    /**
     * action list
     *
     * @return void
     */
    public function listAction()
    {
        $categoryRootUid = 0;
        $this->categoryRepository->setRespectStoragePageFalse();
        $categoryTreeArray = $this->categoryRepository->getCategoryTreeArray($categoryRootUid);
        $this->view->assign('categoryTreeArray', $categoryTreeArray);


        $this->catRepository->setRespectStoragePageFalse();
        $categories = $this->catRepository->findAll();
        $this->view->assign('categories', $categories);

    }
    
    /**
     * action show
     *
     * @param \Infochy\InfochyCat\Domain\Model\Cat $cat
     * @return void
     */
    public function showAction(\Infochy\InfochyCat\Domain\Model\Cat $cat)
    {
        $this->view->assign('cat', $cat);
    }


}
