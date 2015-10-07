<?php

/**
 * <b> ModelagemDeClasse </b>
 * Esta Classe foi criada para realizar testes com o PHP Orientado a Objetos
 *
 *
 * Created by PhpStorm.
 * User: arthur
 * Date: 07/10/15
 * Time: 16:07
 */
class ModelagemDeClasse
{
    /**  @var string Nome do Programador */
    public $Nome;

    /** @var  int Idade */
    public $Idade;

    /** @var  int Profissão */
    public $Profissao;

    /** @var  float Armazena quanto dinheiro o funcionário possui na conta do Banco */
    public $ContaSalario;


    //Constrói a Classe
    function __construct($Nome, $Idade, $Profissao, $ContaSalario)
    {
        $this->Nome = $Nome;
        $this->Idade = $Idade;
        $this->Profissao = $Profissao;
        $this->ContaSalario = $ContaSalario;
    }

    /**
     * <b>trabalhar</b> Realiza um novo trabalho, incrementando a variável $ContaSalario
     * @param $trabalho string Descrição do Trabalho
     * @param $valor float Valor do Trabalho
     */
    public function trabalhar($trabalho, $valor)
    {
        $this->ContaSalario += $valor;
        $this->darEcho("$this->Nome desenvolveu um {$trabalho} e recebeu {$this->toReal($valor)}");
    }

    public function setNome($Nome)
    {
        $this->Nome = $Nome;
    }

    public function setIdade($Idade)
    {
        $this->Idade = $Idade;
    }

    public function setProfissao($Profissao)
    {
        $this->Profissao = $Profissao;
    }

    public function setContaSalario($ContaSalario)
    {
        $this->ContaSalario = $ContaSalario;
    }

    /**
     * Converte o valor enviado por parâmetro para 2 casas após a vírgula, com utilizando o ponto como separador de milhar e a vírgula como separador decimal.
     * @param $valor float Valor a ser convertido
     * @return string Valor convertido
     */
    public function toReal($valor)
    {
        return number_format($valor, '2', '.', ',');
    }

    /**
     * Imprime a mensagem enviada em um parágrafo.
     * @param $mensagem string Mensagem a ser impressa na tela.
     */
    public function darEcho($mensagem)
    {
        echo "<p>$mensagem</p>";
    }

}
