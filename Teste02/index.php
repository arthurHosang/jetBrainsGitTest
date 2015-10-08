.<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
require('./class/ResolucaoDeEscopo.class.php');
require('./class/ResolucaoDeEscopoDigital.class.php');

$produto = new ResolucaoDeEscopo('Livro de PHP', 59.90);
$digital = new ResolucaoDeEscopoDigital("PDF de Php", 39.90);


$produto->vender();
$produto->vender();
$produto->vender();
$digital->vender();
$digital->vender();

$produto->relatorio();
//$digital->relatorio();

echo ResolucaoDeEscopoDigital::$Digital . " livros digitais <br>";
echo ResolucaoDeEscopoDigital::$Vendas - ResolucaoDeEscopoDigital::$Digital . " livros impressos <br>";


echo "<br><hr>";

echo "<pre>";
var_dump($produto);
echo "</pre>";
?>
</body>
</html>
