<?php
include '../menu/menu.php';
include '../../repository/connection.php';
$id_classRoom = $_GET['id_classRoom'];
$id = $_GET['id_student'];
$sql = $pdo->prepare("SELECT * FROM students WHERE id = :id");
$sql -> bindValue('id', $id);
$sql -> execute();
$row = $sql->fetch(PDO::FETCH_ASSOC);

$sql2 = $pdo->prepare("SELECT * FROM classroom");
$sql2 -> execute();

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
              <input type="text" placeholder="Enter your name" name="name" value="<?php echo $row['student']?>" required>
            </div>

            <div class="input-box">
              <span class="details">É alto?</span>
              <select required name="height">
                <option value="1" <?= ($row['height'] == 1) ? 'selected': ''?>>Sim</option>
                <option value="2" <?= ($row['height'] == 2) ? 'selected': ''?>>Não</option>
              </select>
            </div>

            <div class="input-box">
              <span class="details">Tem problema de visão?</span>
              <select required name="vision">
                <option value="1" <?= ($row['vision'] == 1) ? 'selected': ''?>>Sim</option>
                <option value="2" <?= ($row['vision'] == 2) ? 'selected': ''?>>Não</option>
              </select>
            </div>

            <div class="input-box">
              <span class="details">Necessita de acessibilidade?</span>
              <select  required name="acessibility">
                <option value="1" <?= ($row['acessibility'] == 1) ? 'selected': ''?>>Sim</option>
                <option value="2" <?= ($row['acessibility'] == 2) ? 'selected': ''?>>Não</option>
              </select>
            </div>
            <div class="input-box">
              <span class="details">Sala</span>
              <select  required name="id_classRoom">
                <?php while($search = $sql2->fetch(PDO::FETCH_ASSOC)){?>
                <option value="<?php echo $search['id']?>" <?= ($row['classStudentFK'] == $search['id']) ? 'selected': ''?>><?php echo $search['class']?></option>
                <?php }?>
              </select>
            </div>

          </div>
          
          
          <input type="hidden" value="<?php echo $id?>" name="id_student">
          <input type="hidden" value="editar" name="function">
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