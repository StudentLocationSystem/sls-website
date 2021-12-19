<?php
require '../repository/connection.php';
require '../repository/student_repository.php';
$u = new Student();
if(isset($_POST['name']) && !empty($_POST['name']) && isset($_POST['vision']) 
&& !empty($_POST['vision']) && isset($_POST['height']) && !empty($_POST['height']) 
&& isset($_POST['acessibility']) && !empty($_POST['acessibility'])){
  $name = addslashes($_POST['name']);
  $vision =addslashes($_POST['vision']);
  $height =addslashes($_POST['height']);
  $acessibility =addslashes($_POST['acessibility']);
  $function =addslashes($_POST['function']);
  $id_user = $_SESSION['id_userLogged'];
  $id_classRoom = addslashes($_POST['id_classRoom']);
  if($function == 'cadastrar'){
   $u -> createStudent($name,  $vision, $height, $acessibility, $id_user, $id_classRoom);
    echo "<script language='javascript' type='text/javascript'>
        alert('Dados Cadastrados'); window.location.href='../screens/forms/student_form.php?id_classRoom=".$id_classRoom."';</script>";
  }else if($function == 'editar'){
    $id_student = $_POST['id_student'];
    $u -> updateStudent($id_student, $name,  $vision, $height, $acessibility, $id_user, $id_classRoom);
    echo "<script language='javascript' type='text/javascript'>
    alert('Dados Cadastrados'); window.location.href='../screens/class/students_table.php?id_classRoom=".$id_classRoom."';</script>";
  }


}else if(isset( $_GET['id_student']) && !empty( $_GET['id_student'])){
  $id_student = $_GET['id_student'];
  $u -> deleteStudent($id_student);
  echo "<script language='javascript' type='text/javascript'>
  alert('Dados Deletados'); window.location.href='../screens/class/class.php';</script>";

}

?>