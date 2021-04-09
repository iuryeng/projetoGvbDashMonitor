<?php
session_start();
include_once "conection.php";

$nome = '';
$email = '';
$senha = '';


if (isset($_POST['add'])) {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $query = mysqli_query(
        $connect,
        "INSERT INTO users (nome, email, senha)
      VALUES('$nome', '$email', '$senha' )"
    ); 

    $_SESSION['mensage'] = "Usuário Cadastrado com Sucesso!";
    $_SESSION['msg_type'] = "success";

    header("location: register.php");
}

?>
