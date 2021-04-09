<?php

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
        "INSERT INTO usuarios (nome, email, senha)
      VALUES('$nome', '$email', '$senha' )"
    ); //md5 criptografia de senha md5('$senha')

    $query = mysqli_query(
        $connect,
        "INSERT INTO infor_user (NomeUsuario, Email)
      VALUES('$nome', '$email')"
    );

    $_SESSION['mensage'] = "Usuário Cadastrado com Sucesso!";
    $_SESSION['msg_type'] = "success";

    header("location: register.php");
}
