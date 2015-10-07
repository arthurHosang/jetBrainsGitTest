<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
require('./class/ModelagemDeClasse.php');
$arthur = new ModelagemDeClasse("Arthur", 20, "Programador", 2000);


$arthur->setProfissao("Analista de Sistemas");

$arthur->trabalhar("Iha", 100);
echo "<br><br>";
echo "<pre>";
var_dump($arthur);
echo "</pre>";
?>
</body>
</html>