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
    private $linhasAfetadas = -1;

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
        $this->conexao = pg_connect("host={$this->servidor} port={$this->porta} dbname={$this->banco} user={$this->usuario} password={$this->senha}");// or die("Erro");
        echo "<p class='sucesso'>Conectado com Sucesso!</p>";
    }

    public function inserir($objeto)
    {
        reset($objeto->camposValores);
        $sql = "INSERT INTO {$objeto->banco}.{$objeto->tabela} (";


        $objeto->addCampo($objeto->campoPK, $objeto->valorPK);

        for ($i = 0; $i < count($objeto->camposValores); $i++) {
            $sql .= key($objeto->camposValores);
            if ($i < count($objeto->camposValores) - 1) {
                $sql .= ", ";
            }
            next($objeto->camposValores);
        }

        reset($objeto->camposValores);

        $sql .= ") VALUES (";

        for ($i = 0; $i < count($objeto->camposValores); $i++) {
            if (is_numeric($objeto->camposValores[key($objeto->camposValores)])) {
                $sql .= $objeto->camposValores[key($objeto->camposValores)];
            } else {
                $sql .= "'" . $objeto->camposValores[key($objeto->camposValores)] . "'";
            }


            if ($i < count($objeto->camposValores) - 1) {
                $sql .= ", ";
            }
            next($objeto->camposValores);
        }

        $objeto->delCampo($objeto->campoPK);

        $sql .= ");";
        echo $sql;
        return $this->executaSQL($sql);

    }

    public function alterar($objeto)
    {
        $sql = "UPDATE {$objeto->banco}.{$objeto->tabela} SET ";

        for ($i = 0; $i < count($objeto->camposValores); $i++) {

            $sql .= key($objeto->camposValores) . " = ";

            if (is_numeric($objeto->camposValores[key($objeto->camposValores)])) {
                $sql .= $objeto->camposValores[key($objeto->camposValores)];
            } else {
                $sql .= "'" . $objeto->camposValores[key($objeto->camposValores)] . "'";
            }
            if ($i < count($objeto->camposValores) - 1) {
                $sql .= ", ";
            }
            next($objeto->camposValores);
        }

        $sql .= " WHERE " . $objeto->tabela . "." . $objeto->campoPK . " = " . $objeto->valorPK;

        /*if (is_numeric($objeto->campoPK[key($objeto->campoPK)])) {
            $sql .= $objeto->campoPK[key($objeto->campoPK)];
        } else {
            $sql .= "'".$objeto->campoPK[key($objeto->campoPK)]."'";
        }*/

        ////


        $sql .= ";";
        return $this->executaSQL($sql);


    }

    public function deletar($objeto)
    {
        $sql = "DELETE FROM  {$objeto->banco}.{$objeto->tabela} ";


        $sql .= " WHERE " . $objeto->tabela . "." . $objeto->campoPK . " = " . $objeto->valorPK;

        /*if (is_numeric($objeto->campoPK[key($objeto->campoPK)])) {
            $sql .= $objeto->campoPK[key($objeto->campoPK)];
        } else {
            $sql .= "'".$objeto->campoPK[key($objeto->campoPK)]."'";
        }*/

        ////

        $sql .= ";";
        echo $sql;
        return $this->executaSQL($sql);


    }

    public function executaSQL($sql = NULL)
    {
        if ($sql != NULL) {
            //alterar para pg_query_params()
            $querry = pg_query($this->conexao, $sql) or $this->trataErro(__FILE__, __FUNCTION__);
            $this->setLinhasAfetadas(pg_affected_rows($querry));
        } else {
            $this->trataErro(__FILE__, __FUNCTION__, NULL, 'Comando SQL não informado na rotina', FALSE);
        }
        return $querry;
    }

    public function executaSelect($sql = NULL)
    {
        $querry = $this->executaSQL($sql);
        $this->dataset = $querry;
        return $querry;
    }


    public function retornaDados($tipo = NULL)
    {
        switch (strtolower($tipo)) {
            case "array":
                return pg_fetch_array($this->dataset);
            case "assoc":
                return pg_fetch_assoc($this->dataset);
            case "object":
                return pg_fetch_object($this->dataset);
            default:
                return pg_fetch_object($this->dataset);
        }
    }

    public function selecionarTudo($objeto)
    {
        $sql = "SELECT * FROM " . $objeto->banco . "." . $objeto->tabela . " ";
        if ($objeto->extrasSelect != NULL) {
            $sql .= $objeto->extrasSelect;
        }

        $sql .= ";";

        $this->executaSelect($sql);
    }

    public function selecionarCampos($objeto)
    {
        $sql = "SELECT ";

        for ($i = 0; $i < count($objeto->camposValores); $i++) {
            $sql .= key($objeto->camposValores);
            if ($i < count($objeto->camposValores) - 1) {
                $sql .= ", ";
            }
            next($objeto->camposValores);
        }


        $sql .= " FROM " . $objeto->banco . "." . $objeto->tabela . " ";
        if ($objeto->extrasSelect != NULL) {
            $sql .= $objeto->extrasSelect;
        }

        $sql .= ";";

        $o = $this->executaSelect($sql);
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


    /**
     * @return int
     */
    public function getLinhasAfetadas()
    {
        return $this->linhasAfetadas;
    }

    /**
     * @param int $linhasAfetadas
     */
    public function setLinhasAfetadas($linhasAfetadas)
    {
        $this->linhasAfetadas = $linhasAfetadas;
        /*if (is_int($linhasAfetadas)) {
            $this->linhasAfetadas = $linhasAfetadas;
        } else {
            $this->trataErro(__FILE__,__FUNCTION__,NULL,"Parâmetro inválido enviado para a propriedade Linhas Afetadas!");
        }*/
    }

}