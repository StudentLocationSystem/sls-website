<?php
require '../repository/connection.php';
require '../repository/student_repository.php';
$u = new Student();
echo $vision =addslashes($_POST['vision']);
echo $vision =addslashes($_POST['name']);
echo $vision =addslashes($_POST['height']);
echo $vision =addslashes($_POST['acessibility']);
if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['vision']) 
&& !empty($_POST['vision']) && isset($_POST['height']) && !empty($_POST['height']) 
&& isset($_POST['acessibility']) && !empty($_POST['acessibility'])){
  echo 'entrou';
  $name = addslashes($_POST['name']);
  $vision =addslashes($_POST['vision']);
  $height =addslashes($_POST['height']);
  $acessibility =addslashes($_POST['acessibility']);
  $function =addslashes($_POST['function']);
  $id_user = 1;
  $id_classRoom = 2;
 
  if($function = 'cadastrar'){
    $u -> createStudent($name,  $vision, $height, $acessibility, $id_user, $id_classRoom);
    echo "<script language='javascript' type='text/javascript'>
        alert('Dados Cadastrados'); window.location.href='../screens/forms/student_form.php';</script>";
  }else if($function = 'editar'){
    $id_student = $_GET['id_student'];
    $u -> updateStudent($id_student, $name,  $vision, $height, $acessibility, $prority, $id_user, $id_classRoom);
  }else if($function = 'deletar'){
    $id_student = $_GET['id_student'];
    $u -> deleteStudent($id_student);
  }


}

?>