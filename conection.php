<?php

$host = "localhost"; //nome da base de dados
$user = "root"; // usuario do banco
$password = ""; // senha do banco
$database = "gvb_dash_covid"; // nome do banco

$connect = mysqli_connect($host, $user, $password, $database);
//echo "conexao estabelecida com sucesso";
// Checking Connection
if (mysqli_connect_errno()) {
    echo "falha ao conecetar com o  MySQL: " . mysqli_connect_error();
}

mysqli_set_charset($connect, "utf8");

?>