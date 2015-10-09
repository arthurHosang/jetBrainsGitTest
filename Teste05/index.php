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

$c->setCid(6);
$c->setCnome('Hellen');
$c->setCsobrenome("Borba");

//$c->inserirBanco();
//$c->atualizarBanco();
//$c->excluirBanco();

while ($res = $c->retornaDados()) {
    echo $res->id . " / " . $res->nome . " / " . $res->sobrenome . "<br>";
}

echo "<hr><pre>";
var_dump($c);
echo "</pre>";
?>
</body>
</html>
