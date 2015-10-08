<?php

/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 07/10/15
 * Time: 16:47
 */
class ResolucaoDeEscopo
{
    public $Produto;
    public $Valor;
    public static $Vendas;
    public static $Lucro;

    /**
     * ResolucaoDeEscopo constructor.
     * @param $Procuto
     * @param $Valor
     */
    public function __construct($Produto, $Valor)
    {
        $this->Produto = $Produto;
        $this->Valor = $Valor;
    }

    public function vender()
    {
        self::$Vendas += 1;
        self::$Lucro = $this->Valor * self::$Vendas;
        echo "{$this->Produto} vendido por {$this->Valor} <br>";
    }

    public static function relatorio()
    {
        echo "<hr>";
        echo "Este produto vendeu " . self::$Vendas . "unidade(s). Total R$ " . self::$Lucro . ".";
        echo "<hr>";
    }

}