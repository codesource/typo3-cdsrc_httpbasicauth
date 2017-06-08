<?php
/**
 * @copyright Copyright (c) 2016 Code-Source
 */
namespace CDSRC\CdsrcHttpbasicauth\Utility;


use CDSRC\CdsrcHttpbasicauth\Domain\Model\Access;

class AccessPriorityUtility
{
    /**
     * @var array
     */
    protected $pageIds;

    /**
     * AccessPriorityUtility constructor.
     *
     * @param array $pageIds
     */
    public function __construct(array $pageIds)
    {
        $this->pageIds = $pageIds;
    }

    /**
     * Access comparison
     *
     * @param \CDSRC\CdsrcHttpbasicauth\Domain\Model\Access $firstAccess
     * @param \CDSRC\CdsrcHttpbasicauth\Domain\Model\Access $secondAccess
     *
     * @return int
     */
    public function compare(Access $firstAccess, Access $secondAccess)
    {
        if (!isset($this->pageIds[$firstAccess->getPid()])) {
            return -1;
        }
        if (!isset($this->pageIds[$secondAccess->getPid()])) {
            return 1;
        }
        if ($this->pageIds[$firstAccess->getPid()] < $this->pageIds[$secondAccess->getPid()]) {
            return -1;
        }
        if ($this->pageIds[$firstAccess->getPid()] > $this->pageIds[$secondAccess->getPid()]) {
            return 1;
        }

        return $firstAccess->getSorting() > $secondAccess->getSorting() ? 1 :
            $firstAccess->getSorting() < $secondAccess->getSorting() ? -1 : 0;
    }
}