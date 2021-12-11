<!DOCTYPE html>
<html lang="PT-BR">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../components/style_form.css">
        <title>Página de Login - Projeto Social</title>
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
      <form action="../../models/student_models.php" method="POST">
        <div class="user-details">
          <div class="input-box-class register">
            <label>E-mail</label>
            <input type="email" placeholder="Ex: email123@gmail.com" name="name" required>
          </div>
          <div class="spacer"></div>
          <div class="input-box-class register">
            <label>Nome</label>
            <input type="text" placeholder="Digite seu nome" name="name" required>
          </div>     
          <div class="input-box-class register">
            <label>Senha</label>
            <input type="password" placeholder="Digite sua senha" name="name" required>
          </div>
          <div class="spacer"></div>
          <div class="input-box-class register">
            <label>Confirmar senha</label>
            <input type="password" placeholder="Digite sua senha" name="name" required>
          </div>     
        </div>

        <input type="hidden" value="cadastrar" name="function">
        <br>
        <div class="input-box-class button">
          <input type="submit" value="Enviar">
        </div>
      </form>
  </div>

                </div>
            </div>
        </div>
    </body>
</html>