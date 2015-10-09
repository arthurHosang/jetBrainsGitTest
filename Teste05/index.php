<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="_css/css.css">
</head>
<body>

<?php

require_once("_classes/clientes.php");
echo "<p class='sucesso'>Conectado com Sucesso!</p>";

$c = new clientes();
/*
$c->setValor("nome", "Arthur");
$c->setValor("sobrenome", "Ruf");
$c->valorPK = 1;
$c->campoPK = "id";


$c->inserir();
echo "<br>";
$c->alterar();
echo "<br>";
$c->deletar();
echo "<br>";*/
/*$c->extrasSelect = " LIMIT 3";
$c->selecionarCampos($c);

while ($res = $c->retornaDados()) {
    echo $res->id . " / " . $res->nome . " / " . $res->sobrenome . "<br>";
}*/

//select coalesce(max(clientes.id), 0)+1 from aulas.clientes;

echo "<hr><pre>";
var_dump($c);
echo "</pre>";
?>
</body>
</html>
