<?php

namespace Proxies\__CG__;

/**
 * THIS CLASS WAS GENERATED BY THE DOCTRINE ORM. DO NOT EDIT THIS FILE.
 */
class CadObservador extends \CadObservador implements \Doctrine\ORM\Proxy\Proxy
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

    public function getNome()
    {
        $this->__load();
        return parent::getNome();
    }

    public function setCpf($cpf)
    {
        $this->__load();
        return parent::setCpf($cpf);
    }

    public function getCpf()
    {
        $this->__load();
        return parent::getCpf();
    }

    public function setRg($rg)
    {
        $this->__load();
        return parent::setRg($rg);
    }

    public function getRg()
    {
        $this->__load();
        return parent::getRg();
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

    public function setTelefone($telefone)
    {
        $this->__load();
        return parent::setTelefone($telefone);
    }

    public function getTelefone()
    {
        $this->__load();
        return parent::getTelefone();
    }

    public function setSkype($skype)
    {
        $this->__load();
        return parent::setSkype($skype);
    }

    public function getSkype()
    {
        $this->__load();
        return parent::getSkype();
    }

    public function setEndereco($endereco)
    {
        $this->__load();
        return parent::setEndereco($endereco);
    }

    public function getEndereco()
    {
        $this->__load();
        return parent::getEndereco();
    }

    public function setCidade($cidade)
    {
        $this->__load();
        return parent::setCidade($cidade);
    }

    public function getCidade()
    {
        $this->__load();
        return parent::getCidade();
    }

    public function setUf($uf)
    {
        $this->__load();
        return parent::setUf($uf);
    }

    public function getUf()
    {
        $this->__load();
        return parent::getUf();
    }

    public function getIdObserv()
    {
        if ($this->__isInitialized__ === false) {
            return (int) $this->_identifier["idObserv"];
        }
        $this->__load();
        return parent::getIdObserv();
    }


    public function __sleep()
    {
        return array('__isInitialized__', 'nome', 'cpf', 'rg', 'email', 'telefone', 'skype', 'endereco', 'cidade', 'uf', 'idObserv');
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