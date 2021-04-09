<?php 
// destruindo a sessão ao fazer o logout
session_start();
session_destroy();
header('Location: index.php');
exit();

?>