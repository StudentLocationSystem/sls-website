<?php
require '../../repository/connection.php';
if (isset($_SESSION['id_userLogged'])) {
  header('Location: ../home/home.php');
} 
?>
<!DOCTYPE html>
<html lang="PT-BR">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../components/style_form.css">
  
  <script type="text/javascript" src="../components/jquery-3.6.0.min.js"></script>
  <title>Página de Login - Projeto Social</title>
</head>

<body style="background-color: #f8ecff;">
  <div class="body">
    <div class="container">
      <div class="row">
        <div class="card" style="background-color: #451d5c;">
          <img src="../../img/banner_login.png" style="height: 94%; width: 94%; margin: 30px 3%;" />
        </div>
        <div class="wrapper-page">
          <h2>Login</h2>
          <form action="../../models/user_sign_models.php" method="POST">
            <div class="user-details">
              <div class="input-box-class">
                <label>E-mail</label>
                <input type="email" placeholder="Ex: email123@gmail.com" name="email" id="email" required>
              </div>
              <div class="spacer"></div>
              <div class="input-box-class">
                <label>Senha</label>
                <input type="password" placeholder="Digite sua senha" name="pass" id="password" required>
              </div>
            </div>
         
            <input type="hidden" value="logar" name="function">
            <div class="input-box-class">
            <p id="alert"> </p>
              <a href="register.php">Cadastre-se Agora</a>
            </div>
            <dix class="spacer">
              <div class="input-box-class button">
                <input type="submit" id="submit" value="Enviar">
              </div>
          </form>
        </div>

      </div>
    </div>
  </div>
</body>
</html>

<script type="text/javascript">
  
$(document).ready(function(){
		$('#submit').click(function(){
      var email = $('#email').val();
			var pass = $('#password').val();

      $('#alert').html('');
			if (email == '') {
				$('#alert').html('Preencher o email.');
				$('#alert').addClass("alert-danger");
				return false;				
			}
			$('#alert').html('');
			if (pass == '') {
				$('#alert').html('Preencha o campo de senha.');
				$('#alert').addClass("alert-danger");
				return false;				
			}
			$('#alert').html('');

		});
	});
</script>