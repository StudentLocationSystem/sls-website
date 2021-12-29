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
        <div class="body">
            <div class="container">
                <div class="row">
                    <div class="card">
                        <h2>Lorem ipsum</h2>
                        <p>A expressão Lorem ipsum em design gráfico e editoração é um texto padrão em latim utilizado na produção gráfica para preencher os espaços de texto em publicações para testar e ajustar aspectos visuais antes de utilizar conteúdo real. <span>Cadastrar</span></p>

                    </div>
                    <div class="wrapper-page">
    <h2>Registre-se</h2>
      <form action="../../models/user_sign_models.php" id="form" method="POST">
        <div class="user-details">
          <div class="input-box-class ">
            <label>E-mail</label>
            <input type="email" placeholder="Ex: email123@gmail.com" name="email" id="email" required>
          </div>

          <div class="input-box-class ">
            <label>Nome</label>
            <input type="text" placeholder="Digite seu nome" name="name" id="name" required>
          </div>     
          <div class="input-box-class ">
            <label>Senha</label>
            <input type="password" placeholder="Digite sua senha" name="password" id="password" required>
          </div>
              <label id="alert"></label>
        </div>
        <input type="hidden" value="cadastrar" name="function" id="function">
     
        <div class="input-box-class button">
          <input type="submit" value="Enviar" id="submit" name="enviar">
        </div>
      </form>
  </div>

                </div>
            </div>
        </div>
    </body>
</html>

