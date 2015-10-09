<?php

/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 09/10/15
 * Time: 10:52
 */
require_once("tabelabase.php");

class clientes extends tabelabase
{
    public function __construct($campos = array())
    {
        parent::__construct();
        $this->tabela = "clientes";
        //$this->camposValores = $campos;
        if (sizeof($campos) <= 0) {
            $this->camposValores = array(
                "nome" => NULL,
                "sobrenome" => NULL
            );
        } else {
            $this->camposValores = $campos;
        }
        echo "<p class='sucesso'>FIM Construct</p>";
    }
}