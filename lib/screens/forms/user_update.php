<?php
include '../menu/menu.php';

$u = new User();
$sql = $u -> stringUser($_SESSION['id_userLogged']);
$user = $sql-> fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="PT-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../components/style_form.css">
    <title>Página de Login - Projeto Social</title>
    <script type="text/javascript" src="../components/jquery-3.6.0.min.js"></script>
</head>

<body>

    <head>
        <link rel="stylesheet" href="../components/style_form.css">

        <link rel="stylesheet" href="../components/style_menu.css">
    </head>

    <div class="main-content">
        <header>
            <div class="search-wrapper title">
                <h2 style="font-size: 24px;">Atualizar dados da Conta</h2>
            </div>
        </header>
        <main>



            <div class="body">
                <div class="wrapper">
                    <h2>Cadastro de sala</h2>
                    <form action="../../models/user_sign_models.php" method="POST">
                        <div class="user-details">
                            <div class="input-box-class">
                                <label>E-mail</label>
                                <input value="<?php echo $user['email']; ?>"type="email" placeholder="Ex: email123@gmail.com" name="email" id="email" required>
                            </div>
                            <div class="input-box-class">
                                <span class="details">Nome</span>
                                <input value="<?php echo $user['user'];?>" type="text" placeholder="Digite seu nome" name="name" id="name" required>
                            </div>
                            <div class="input-box-class">
                                <span class="details">Senha</span>
                                <input type="password" placeholder="Digite sua senha" name="password" id="password" required>
                            </div>
                            <div class="input-box-class">
                                <span class="details">Confirmar Senha</span>
                                <input type="password" placeholder="Digite sua senha" name= "confirmPassword" id="cofirmPassword" required>
                            </div>

                            <p id="alert"> </p>
                            <input type="hidden" name="function" id="function" value="change">
                            <br>
                        </div>
                        <div class="input-box button">
                            <input type="Submit" id="submit" value="Enviar">
                        </div>

                    </form>
                </div>
        </main>
    </div>
    </div>
</body>

</html>

</body>

</html>

<script type="text/javascript">
    $(document).ready(function() {
        $('#submit').click(function() {
            var email = $('#email').val();
            var name = $('#name').val();
            var pass = $('#password').val();
            var confirmPass = $('#cofirmPassword').val();

            $('#alert').html('');
            if (email == '') {
                $('#alert').html('Preencher o email.');
                $('#alert').addClass("alert-danger");
                return false;
            }
            $('#alert').html('');
            if (name == '') {
                $('#alert').html('Preencha o nome.');
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
            if (confirmPass == '') {
                $('#alert').html('Preencha o campo de senha.');
                $('#alert').addClass("alert-danger");
                return false;
            }
            $('#alert').html('');
            if (confirmPass == pass) {
                $('#alert').html('.');
                $('#alert').addClass("alert-danger");
                return true;
            } else {
                $('#alert').html('Senhas diferentes');
                $('#alert').addClass("alert-danger");
                return false;
            }
            $('#alert').html('');

        });
    });
</script>