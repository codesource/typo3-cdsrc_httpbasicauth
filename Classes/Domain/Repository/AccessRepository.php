<?php
/**
 * @copyright Copyright (c) 2016 Code-Source
 */
namespace CDSRC\CdsrcHttpbasicauth\Domain\Repository;


use CDSRC\CdsrcHttpbasicauth\Utility\AccessPriorityUtility;
use TYPO3\CMS\Extbase\Persistence\Generic\Typo3QuerySettings;
use TYPO3\CMS\Extbase\Persistence\Repository;

class AccessRepository extends Repository
{
    /**
     * Initializes the repository.
     *
     * @return void
     */
    public function initializeObject()
    {
        /** @var $querySettings Typo3QuerySettings */
        $querySettings = $this->objectManager->get(Typo3QuerySettings::class);
        $querySettings->setRespectStoragePage(false);
        $this->setDefaultQuerySettings($querySettings);
    }

    /**
     * Find first access based on pid rootline
     *
     * @param $pid
     *
     * @return array
     */
    public function findByPids($pageIds)
    {
        $query = $this->createQuery();
        $accesses = $query->matching(
            $query->in('pid', $pageIds)
        )->execute()->toArray();
        usort($accesses, [new AccessPriorityUtility(array_flip($pageIds)), 'compare']);

        return $accesses;
    }
}