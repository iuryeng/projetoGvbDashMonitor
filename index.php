
<?php
include_once "conection.php";
?>
<!DOCTYPE html>
<meta charset="utf-8">
<html>
   <head>
   <title></title>
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <link rel="stylesheet" href="assets/css/dashforge.css">
   </head>
   <body>
      <div class="row justify-content-center">
         <br>
         <h3>Login Sistema de Monitoramento Covid da GVB</h3>
      </div>
     <div class="container">
         <div class="row justify-content-center >
            <div class="col-md-4 col-xs-4">
            <div class="form-group card-login">
               <form action ="login.php"  method="POST">              
                  <div class="form-gourp">
                     <br>
                     <br>
                     <br>
                     <spam">Entre com suas credenciais</spam>
                     <br>
                     <label>Email</label>
                     <input type="email" name="email" class="form-control" placeholder="Seu username" required=""  oninvalid="this.setCustomValidity('Por favor, entre com email válido')"
                        oninput="setCustomValidity('')"> </input>
                  </div>
                  <div class = form-goup>
                     <label>Senha</label>
                     <input type="password" name="senha" class="form-control" placeholder="Sua senha" required="" oninvalid="this.setCustomValidity('Você precisa digitar sua senha')"
                        oninput="setCustomValidity('')"></input>    
                  </div>
          
                     <br>
                     <button type="submit" class="btn btn-info" name="login">Login</button>
                     <a href="register.php" class="btn btn-primary">Cadastrar</a><br><br>
                   
                  </div>
               </form>
            </div>
         </div>
      </div>
   </body>
</html>