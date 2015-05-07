<?php

namespace Proxies\__CG__;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class Cad_observador extends \Cad_observador implements \Doctrine\ORM\Proxy\Proxy
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

    
    public function setNome($nome)
    {
        $this->__load();
        return parent::setNome($nome);
    }

    public function setCpf($cpf)
    {
        $this->__load();
        return parent::setCpf($cpf);
    }

    public function setRg($rg)
    {
        $this->__load();
        return parent::setRg($rg);
    }

    public function setEmail($email)
    {
        $this->__load();
        return parent::setEmail($email);
    }

    public function setTel($tel)
    {
        $this->__load();
        return parent::setTel($tel);
    }

    public function setSkype($skype)
    {
        $this->__load();
        return parent::setSkype($skype);
    }

    public function setEnd($end)
    {
        $this->__load();
        return parent::setEnd($end);
    }

    public function setCidade($cidade)
    {
        $this->__load();
        return parent::setCidade($cidade);
    }

    public function setUf($uf)
    {
        $this->__load();
        return parent::setUf($uf);
    }

    public function getObservId()
    {
        $this->__load();
        return parent::getObservId();
    }

    public function getObservNome()
    {
        $this->__load();
        return parent::getObservNome();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'id_observ', 'nome', 'cpf', 'rg', 'email', 'tel', 'skype', 'end', 'cidade', 'uf');
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