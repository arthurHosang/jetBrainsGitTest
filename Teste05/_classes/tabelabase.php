<?php
/**
 * Classe base para as classes das Tabelas
 */

require_once("banco.php");

abstract class tabelabase extends banco
{
    public $tabela = "";
    public $camposValores = array();
    public $campoPK = NULL;
    public $valorPK = NULL;
    public $extrasSelect = "";

    public function addCampo($campo = NULL, $valor = NULL)
    {
        if ($campo != NULL) {
            $this->camposValores[$campo] = $valor;
        }
    }

    public function delCampo($campo)
    {
        if (array_key_exists($campo, $this->camposValores)) {
            unset($this->camposValores[$campo]);
        }
    }

    public function setValor($campo = NULL, $valor = NULL)
    {
        if ($campo != NULL && $valor != NULL) {
            $this->camposValores[$campo] = $valor;
        }
    }

    public function getValor($campo = NULL)
    {
        if ($campo != NULL && array_key_exists($campo, $this->camposValores)) {
            return $this->camposValores[$campo];
        } else {
            return false;
        }

    }
}