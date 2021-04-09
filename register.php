<?php 
session_start();
if(!$_SESSION['email']){
	header('Location: index.php');
	exit();
}?>

<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dashforge.css">
</head>

<body>
	<div class="row justify-content-center">
	<br>
		<h1> Cadastro de Usuário</h1>
	</div>
		<?php require_once 'process.php';?>
		<?php if (isset($_SESSION['mensage'])):?>
	<div class="alert alert-<?= $_SESSION['msg_type'] ?>">

	<?php	 
	 echo $_SESSION['mensage'];
	 unset($_SESSION['mensage']);
	 ?>
	</div>
	<?php endif;?>
	<div class="container">		
	<div class="row justify-content-center">
	  <div class="col-md-4 col-xs-4">
	    <div class="form-group card-login">
			<form action ="process.php"  method="POST">
				<input type="hidden" name="id" value="<?php echo $id;?>">
					<div class = "form-gourp">
					<label>Nome</label>
					<input type="text" name="nome" class="form-control">
					</div>

					<div class="form-gourp">
					  <label>Email</label>
					  <input type="text" name="email" class="form-control" > 
				    </div>
					   <div class = form-goup>
						<label>Senha</label>
						<input type="text" name="senha" class="form-control" >
						<br>
						<button type="submit" class="btn btn-primary" name="add">Cadastrar</button>	
						<a href="index.php">voltar a pagina de login</a>
					</div>
			</form>
		</div>
	</div>
	</div>

	</body>
</html>