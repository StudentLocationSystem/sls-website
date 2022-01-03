<?php
include '../menu/menu.php';
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
  
<link rel="stylesheet" href="../components/style_menu.css">
</head>
<div class="main-content">
<header>
        <div class="search-wrapper title">
            <h2 style="font-size: 24px;">Atualizar aluno</h2>
        </div>
    </header>
  <main>
    <br>
    <div class="body">
      <div class="wrapper">
        <h2>Cadastro Aluno</h2>
        <form action="../../models/student_models.php" method="POST">
          <div class="user-details">
            <div class="input-box">
              <span class="details">Aluno</span>
              <input type="text" placeholder="Enter your name" name="name" id="name" value="<?php echo $row['student']?>" required>
            </div>

            <div class="input-box">
              <span class="details">É alto?</span>
              <select required name="height" id="height">
                <option value="1" <?= ($row['height'] == 1) ? 'selected': ''?>>Sim</option>
                <option value="2" <?= ($row['height'] == 2) ? 'selected': ''?>>Não</option>
              </select>
            </div>

            <div class="input-box">
              <span class="details">Tem problema de visão?</span>
              <select required name="vision" id="vision">
                <option value="1" <?= ($row['vision'] == 1) ? 'selected': ''?>>Sim</option>
                <option value="2" <?= ($row['vision'] == 2) ? 'selected': ''?>>Não</option>
              </select>
            </div>

            <div class="input-box">
              <span class="details">Necessita de acessibilidade?</span>
              <select  required name="acessibility" id="acessibility">
                <option value="1" <?= ($row['acessibility'] == 1) ? 'selected': ''?>>Sim</option>
                <option value="2" <?= ($row['acessibility'] == 2) ? 'selected': ''?>>Não</option>
              </select>
            </div>
            <div class="input-box">
              <span class="details">Sala</span>
              <select  required name="id_classRoom" id="id_classRoom">
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
            <input type="submit" id="submit" value="Enviar">
          </div>
        </form>
      </div>
    </div>
  </main>
</div>
</body>

</html>
<script type="text/javascript"> 

$(document).ready(function(){
		$('#submit').click(function(){
      var name = $('#name').val();
			var acessibility = $('#acessibility').val();
			var vision = $('#vision').val();
			var height = $('#height').val();
      var functions = $('#function').val();


      $('#alert').html('');
			if (name == '') {
				$('#alert').html('Preencher o nome.');
				$('#alert').addClass("alert-danger");
				return false;				
			}
			$('#alert').html('');
			if (acessibility == '') {
				$('#alert').html('Preencha o campo de acessibilidade.');
				$('#alert').addClass("alert-danger");
				return false;				
			}

			$('#alert').html('');
			if (vision == '') {
				$('#alert').html('Preencha o campo de visão.');
				$('#alert').addClass("alert-danger");
				return false;
			}

			$('#alert').html('');
			if (height == '') {
				$('#alert').html('Preencha o campo de altura.');
				$('#alert').addClass("alert-danger");
				return false;
			}

			$('#alert').html('');

		});
	});
</script>



