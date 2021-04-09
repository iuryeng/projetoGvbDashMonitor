<?php

session_start();
include_once "conection.php";

if (isset($_POST['login'])) {
    //mysqli_real_escape_string para proteção de ataquele sql inhe
    $email = mysqli_real_escape_string($connect, $_POST['email']);
    $senha = mysqli_real_escape_string($connect, $_POST['senha']);

    $query = "SELECT id, nome, email FROM usuarios WHERE email='{$email}' and senha='{$senha}'";
    $result = mysqli_query($connect, $query);

    $status = mysqli_num_rows($result); // verifica se retorna uma linha de resultado
    echo status;
    if ($status == 1) {
        $_SESSION['email'] = $email;
        header('Location: dash.php');
        exit();
    } else {
        header('Location: index.php');
        exit();
    }
}
?>
