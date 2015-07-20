<?php

namespace Proxies\__CG__;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class SystemUsers extends \SystemUsers implements \Doctrine\ORM\Proxy\Proxy
{
    private $_entityPersister;
    private $_identifier;
    public $__isInitialized__ = false;
    public function __construct($entityPersister, $identifier)
    {
        $this->_entityPersister = $entityPersister;
        $this->_identifier = $identifier;
    }
    /** @private */
    public function __load()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;

            if (method_exists($this, "__wakeup")) {
                // call this after __isInitialized__to avoid infinite recursion
                // but before loading to emulate what ClassMetadata::newInstance()
                // provides.
                $this->__wakeup();
            }

            if ($this->_entityPersister->load($this->_identifier, $this) === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            unset($this->_entityPersister, $this->_identifier);
        }
    }

    /** @private */
    public function __isInitialized()
    {
        return $this->__isInitialized__;
    }

    
    public function getId()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["id"];
        }
        $this->__load();
        return parent::getId();
    }

    public function setEmail($email)
    {
        $this->__load();
        return parent::setEmail($email);
    }

    public function getEmail()
    {
        $this->__load();
        return parent::getEmail();
    }

    public function setPassword($password)
    {
        $this->__load();
        return parent::setPassword($password);
    }

    public function getPassword()
    {
        $this->__load();
        return parent::getPassword();
    }

    public function setSalt($salt)
    {
        $this->__load();
        return parent::setSalt($salt);
    }

    public function getSalt()
    {
        $this->__load();
        return parent::getSalt();
    }

    public function setUserRole($userRole)
    {
        $this->__load();
        return parent::setUserRole($userRole);
    }

    public function getUserRole()
    {
        $this->__load();
        return parent::getUserRole();
    }

    public function setLastLogin($lastLogin)
    {
        $this->__load();
        return parent::setLastLogin($lastLogin);
    }

    public function getLastLogin()
    {
        $this->__load();
        return parent::getLastLogin();
    }

    public function setLastLoginIp($lastLoginIp)
    {
        $this->__load();
        return parent::setLastLoginIp($lastLoginIp);
    }

    public function getLastLoginIp()
    {
        $this->__load();
        return parent::getLastLoginIp();
    }

    public function setResetRequestCode($resetRequestCode)
    {
        $this->__load();
        return parent::setResetRequestCode($resetRequestCode);
    }

    public function getResetRequestCode()
    {
        $this->__load();
        return parent::getResetRequestCode();
    }

    public function setResetRequestTime($resetRequestTime)
    {
        $this->__load();
        return parent::setResetRequestTime($resetRequestTime);
    }

    public function getResetRequestTime()
    {
        $this->__load();
        return parent::getResetRequestTime();
    }

    public function setResetRequestIp($resetRequestIp)
    {
        $this->__load();
        return parent::setResetRequestIp($resetRequestIp);
    }

    public function getResetRequestIp()
    {
        $this->__load();
        return parent::getResetRequestIp();
    }

    public function setVerificationStatus($verificationStatus)
    {
        $this->__load();
        return parent::setVerificationStatus($verificationStatus);
    }

    public function getVerificationStatus()
    {
        $this->__load();
        return parent::getVerificationStatus();
    }

    public function setStatus($status)
    {
        $this->__load();
        return parent::setStatus($status);
    }

    public function getStatus()
    {
        $this->__load();
        return parent::getStatus();
    }

    public function setName($name)
    {
        $this->__load();
        return parent::setName($name);
    }

    public function getName()
    {
        $this->__load();
        return parent::getName();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id', 'email', 'password', 'salt', 'lastLogin', 'lastLoginIp', 'resetRequestCode', 'resetRequestTime', 'resetRequestIp', 'verificationStatus', 'status', 'name', 'userRole');
    }

    public function __clone()
    {
        if (!$this->__isInitialized__ && $this->_entityPersister) {
            $this->__isInitialized__ = true;
            $class = $this->_entityPersister->getClassMetadata();
            $original = $this->_entityPersister->load($this->_identifier);
            if ($original === null) {
                throw new \Doctrine\ORM\EntityNotFoundException();
            }
            foreach ($class->reflFields as $field => $reflProperty) {
                $reflProperty->setValue($this, $reflProperty->getValue($original));
            }
            unset($this->_entityPersister, $this->_identifier);
        }
        
    }
}