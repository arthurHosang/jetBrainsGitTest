<?php

/**
 * Classe genérica para conectar com o banco
 * Created by PhpStorm.
 * User: arthur
 * Date: 08/10/15
 * Time: 16:18
 */
class banco
{

    /** @var string Endereço do Servidor */
    public $servidor = "localhost";

    /** @var string Porta em que o banco está disparado */
    public $porta = "5432";

    /** @var string Usuário de acesso ao banco */
    public $usuario = "postgres";

    /** @var string Senha do banco */
    public $senha = "1234";

    /** @var string Nome do Banco de Dados */
    public $banco = "aulas";

    /** @var null Ainda não sei hehe */
    public $conexao = NULL;

    /** @var null DataSet */
    public $dataset = NULL;

    /** @var int Quantidade de linhas afetadas pela ultima operação */
    public $linhasAfetadas = -1;

    /**
     * banco constructor.
     * @param string $servidor
     * @param string $porta
     * @param string $usuario
     * @param string $senha
     * @param string $banco
     * @param null $conexao
     */
    public function __construct()
    {
        echo "p1";
        $this->conecta();
        //$servidor, $porta, $usuario, $senha, $banco, $conexao
        /*$this->servidor = $servidor;
        $this->porta = $porta;
        $this->usuario = $usuario;
        $this->senha = $senha;
        $this->banco = $banco;
        $this->conexao = $conexao;
        */
    }

    public function __destruct()
    {
        if ($this->conexao != NULL) {
            pg_close($this->conexao);
        }
    }

    public function conecta()
    {
        //$this->conexao = pg_connect("host={$this->servidor} port={$this->porta} dbname={$this->banco} user={$this->usuario} password={$this->senha}");// or die("Erro");
        $this->conexao = pg_connect("host=172.20.10.2 port=5432 dbname=aulas user=postgres password=1234") or die("Erro");
        echo "SUCESSO!";
    }

    public function trataErro($arquivo = NULL, $rotina = NULL, $numErro = NULL, $mensagem = NULL, $geraExcept = false)
    {
        if ($arquivo == NULL) $arquivo = "não informado";
        if ($rotina == NULL) $rotina = "não informado";
        if ($numErro == NULL) $numErro = pg_last_error($this->conexao);
        if ($mensagem == NULL) $mensagem = pg_errormessage($this->conexao);

        $res = "Ocorreu um erro com em {$arquivo} ao {$rotina}. <br>Erro número {$numErro} - {$mensagem}.";

        if ($geraExcept) {
            die($res);
        } else {
            echo $res;
        }

    }
}