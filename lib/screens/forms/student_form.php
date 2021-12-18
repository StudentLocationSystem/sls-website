<?php
include '../menu/menu.php';
$id_classRoom = $_GET['id_classRoom'];

?>
<head>
<link rel="stylesheet" href="../components/style_form.css">
</head>
<div class="main-content">
  <main>
    <br>
  <h2 class="dash-title">Overview</h2>
  <div class="body">
  <div class="wrapper">
    <h2>Cadastro Aluno</h2>
      <form action="../../models/student_models.php" method="POST">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Aluno</span>
            <input type="text" placeholder="Enter your name" name="name" required>
          </div>
          
          <div class="input-box">
            <span class="details">É alto?</span>
            <select  required name="height">
            <option value="1">Sim</option>
            <option value="2">Não</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Tem problema de visão?</span>
            <select  required name="vision">
            <option value="1">Sim</option>
            <option value="2">Não</option>
            </select>
          </div>
          <div class="input-box">
            <span class="details">Necessita de acessibilidade?</span>
            <select  required name="acessibility">
            <option value="1">Sim</option>
            <option value="2">Não</option>
            </select>
          </div>      
        </div>
        <input type="hidden" value="cadastrar" name="function">
        <input type="hidden" value="<?php echo $id_classRoom?>" name="id_classRoom">
        <br>
        <div class="input-box button">
          <input type="submit" value="Enviar">
        </div>
      </form>
  </div>
  </div>
</main>
</div>
</body>
</html>
<?php
echo $id_classRoom;
?>