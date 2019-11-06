<?php
namespace Infochy\InfochyCat\Domain\Repository;


class CategoryRepository extends \TYPO3\CMS\Extbase\Domain\Repository\CategoryRepository
{
    public function setRespectStoragePageFalse() {
        $querySettings = $this->objectManager->get('TYPO3\\CMS\\Extbase\\Persistence\\Generic\\Typo3QuerySettings');
        $querySettings->setRespectStoragePage(FALSE);
        $this->setDefaultQuerySettings($querySettings);
    }

    public function getCategoryTreeArray($categoryRootUid){
        $categoryTreeArray=array();
        $categories = $this->findSubCategories($categoryRootUid);
        $i=0;
        foreach ($categories as $category){
            $categoryTreeArray[$i]['uid'] = $category->getUid();
            $categoryTreeArray[$i]['title'] = $category->getTitle();
            $categoryTreeArray[$i]['subCategories'] = $this->getCategoryTreeArray($category->getUid());
            $i++;
        }
        return $categoryTreeArray;
    }

    public function findSubCategories($parentCategory)
    {
        $query = $this->createQuery();
        $query->getQuerySettings()->setRespectStoragePage(false);
        return $query->matching($query->logicalAnd($query->equals('parent', (int)$parentCategory)))->execute();
    }
}
