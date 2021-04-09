<!DOCTYPE html>
<html>
<meta charset="utf-8">
<head>
	<title></title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
	<div class="row justify-content-center">
			<br>
		<h1> Cadastro de Usuário</h1>

		

	</div>

		<?php require_once 'process.php'; ?> 

		<?php if (isset($_SESSION['mensage'])): ?>

	<div class="alert alert-<?= $_SESSION['msg_type'] ?>">

	<?php
 echo $_SESSION['mensage'];
 unset($_SESSION['mensage']);
 ?>
	</div>

	<?php endif; ?>
	<div class="container">

		
	<div class="row justify-content-center">
	  <div class="col-md-4 col-xs-4">
	    <div class="form-group card-login">
			<form action ="process.php"  method="POST">
				<input type="hidden" name="id" value="<?php echo $id; ?>">
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
						<input type="password" name="senha" class="form-control" > 	

						<br>

						<button type="submit" class="btn btn-primary" name="add">Cadastrar</button>	
						<a href="index.php">voltar pra login</a>
						</div>		 
			</form>
		</div>
	</div>
	</div>

	</body>
</html>