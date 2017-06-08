<?php
/**
 * @copyright Copyright (c) 2016 Code-Source
 */
namespace CDSRC\CdsrcHttpbasicauth\Domain\Model;


use TYPO3\CMS\Extbase\DomainObject\AbstractEntity;

class Access extends AbstractEntity
{

    /**
     * @var int
     */
    protected $sorting;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $username;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $message;

    /**
     * @var bool
     */
    protected $allowAccessToEverybody;

    /**
     * @var bool
     */
    protected $allowPropagation;

    /**
     * @return int
     */
    public function getSorting()
    {
        return $this->sorting;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @return string
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @return boolean
     */
    public function isAccessAllowedToEverybody()
    {
        return $this->allowAccessToEverybody;
    }

    /**
     * @return boolean
     */
    public function isPropagationAllowed()
    {
        return $this->allowPropagation;
    }


}