<?php
/**
 * Classe base para as classes das Tabelas
 */

require_once("banco.php");

abstract class tabelabase extends banco
{
    public $tabela = "";
    public $camposValores = array();
    public $camposPK = array();
    public $extrasSelect = "";

    public abstract function inserirBanco();

    public abstract function atualizarBanco();

    public abstract function excluirBanco();

    public function executaSelect($sql = NULL)
    {
        $querry = $this->executaSQL($sql);
        $this->dataset = $querry;
        return $querry;
    }

    public function executaConsultaUnica($sql = NULL)
    {
        $st = $this->executaSQL($sql);

        if ($st->rowCount() >= 1) {
            $resultado = $st->fetch(PDO::FETCH_NUM);
            return $resultado[0];
        } else {
            return false;
        }
    }
}