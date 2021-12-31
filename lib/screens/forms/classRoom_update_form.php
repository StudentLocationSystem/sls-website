<?php
include '../menu/menu.php';
include '../../repository/connection.php';
$id = $_GET['id_classRoom'];
$sql = $pdo->prepare("SELECT * FROM classroom WHERE id = :id");
$sql -> bindValue('id', $id);
$sql -> execute();
$row =  $sql->fetch(PDO::FETCH_ASSOC);
?>
<head>
<link rel="stylesheet" href="../components/style_form.css">
</head>

 <div class="main-content">
  <main>
    
  <h2 class="dash-title">Atualizar dados da Sala</h2>
            
  <div class="body">
  <div class="wrapper">
    <h2>Editar a sala</h2>
    <form action="../../models/classRoom_models.php" method="POST">
      <div class="input-box">
        <span class="details">Nome da sala</span>
        <input type="char" placeholder="Nome da sala"  name="class" id="class"  required value="<?php echo $row['class'];?>">
      </div>
      <div class="user-details">
      <div class="input-box">
        <span class="details">Comprimento da sala</span>
        <input type="number" placeholder="Comprimento da sala" name="chairWidth" id="chairWidth"  required  value="<?php echo $row['chairWidth'];?>">
      </div>
      <br>
      <div class="input-box">
        <span class="details">Largura da Sala</span>
        <input type="number" placeholder="Largura da sala" name="chairLength" id="chairLength"  required  value="<?php echo $row['chairLength'];?>">
      </div>
      </div>
      <input type="hidden" name="function" value="editar">
      <input type="hidden" name="id_classRoom" value="<?php echo $id?>">
      <br>
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
<script type="text/javascript"> 

$(document).ready(function(){
		$('#submit').click(function(){
			var classe = $('#class').val();
			var chairWidth = $('#chairWidth').val();
			var chairLength = $('#chairLength').val();
      var functions = $('#function').val();


			$('#alert').html('');
			if (classe == '') {
				$('#alert').html('Preencher o nome da classe.');
				$('#alert').addClass("alert-danger");
				return false;				
			}

			$('#alert').html('');
			if (chairWidth == '') {
				$('#alert').html('Preencher o tamanho da largura da sala.');
				$('#alert').addClass("alert-danger");
				return false;
			}

			$('#alert').html('');
			if (chairLength == '') {
				$('#alert').html('Preencher o tamanho do comprimento da sala.');
				$('#alert').addClass("alert-danger");
				return false;
			}

			$('#alert').html('');

		});
	});
</script>

