<?php

class ComposicaoUsuario
{
    private $Nome;
    private $Email;
    private $Endereco;

    /**
     * ComposicaoUsuario constructor.
     * @param $Nome
     * @param $Email
     */
    public function __construct($Nome, $Email)
    {
        $this->Nome = $Nome;
        $this->Email = $Email;
    }

    public function cadastraEndereco($Cidade, $Estado)
    {
        $this->Endereco = new ComposicaoEndereco($Cidade, $Estado);
    }


    public function getEndereco()
    {
        return $this->Endereco;
    }


}