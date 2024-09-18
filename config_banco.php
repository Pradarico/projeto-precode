<?php
$dbHost = "localHost";
$dbUser = "postgres";
$dbPass = "123";


$conexao = pg_connect("host=$dbHost dbname=projeto user=$dbUser password=$dbPass") or die ("Nao foi possivel conectar ao servidor PostGreSQL");
/*echo "Conexao efetuada com sucesso!";
pg_close($conexao) or die ("Nao foi possivel desconectar");
echo "<br>Desconectado com sucesso!";*/
?>