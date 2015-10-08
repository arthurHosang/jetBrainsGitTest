<?php

/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 07/10/15
 * Time: 17:10
 */
class AcessoPrivado
{
    /** @var  string Nome da pessoa */
    private $Nome;

    /** @var  string Email pessoal */
    private $Email;

    /** @var  string CPF da pessoa */
    private $CPF;

    /**
     * AcessoPrivado constructor.
     * @param string $Nome
     * @param string $Email
     * @param string $CPF
     */
    public function __construct($Nome, $Email, $CPF)
    {
        $this->setNome($Nome);
        $this->setEmail($Email);
        $this->setCPF($CPF);
    }

    /**
     * @return string
     */
    public function getNome()
    {
        return $this->Nome;
    }

    /**
     * @param string $Nome
     */
    public function setNome($Nome)
    {
        if (is_string($Nome)) {
            $this->Nome = $Nome;
        } else {
            die('Erro no nome!');
        }
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->Email;
    }

    /**
     * @param string $Email
     */
    public function setEmail($Email)
    {
        if (filter_var($Email, FILTER_VALIDATE_EMAIL)) {
            $this->Email = $Email;
        } else {
            die('Email inválido!');
        }
    }

    /**
     * @return string
     */
    public function getCPF()
    {
        return $this->CPF;
    }

    /**
     * @param string $CPF
     */
    public function setCPF($CPF)
    {
        if (preg_match('/[0-9]*/i', $CPF) && strlen($CPF) == 11) {
            $this->CPF = $CPF;
        } else {
            die('CPF inválido!');
        }
    }


}