<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title></title>
</head>
<body>
<?php
require('./class/ComposicaoUsuario.php');

$arthur = new ComposicaoUsuario('Arthur', 'ee');


echo "<pre>";
var_dump($arthur);
echo "</pre>";
?>
</body>
</html>