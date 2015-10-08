<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
require('./class/AcessoPrivado.class.php');

$arthur = new AcessoPrivado('123', 'xcd@a.c', '05864425658');


echo "<pre>";
var_dump($arthur);
echo "</pre>";
?>
</body>
</html>