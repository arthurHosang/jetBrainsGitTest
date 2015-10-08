<?php

/**
 * Created by PhpStorm.
 * User: arthur
 * Date: 07/10/15
 * Time: 16:47
 */
class ResolucaoDeEscopoDigital extends ResolucaoDeEscopo
{
    public static $Digital;

    /**
     * ResolucaoDeEscopoDigital constructor.
     */
    public function __construct($Produto, $Valor)
    {
        parent::__construct($Produto, $Valor);
    }

    public function vender()
    {
        self::$Digital += 1;
        parent::vender();
    }


}