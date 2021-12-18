<?php 
require '../repository/classRoom_repository.php';
require '../repository/connection.php';

$u = new ClassRoom();
if(isset($_POST['class']) && !empty($_POST['class']) && isset($_POST['chairLength']) 
&& !empty($_POST['chairLength']) && isset($_POST['chairWidth']) && !empty($_POST['chairWidth'])){
  $class = addslashes($_POST['class']);
  $chairLength =$_POST['chairLength'];
  $chairWidth =$_POST['chairWidth'];
  $function =addslashes($_POST['function']);
  $id_user = $_SESSION['id_userLogged'];
  if($function = 'cadastrar'){
    $u -> createClassRoom($class,  $chairLength, $chairWidth, $id_user);
    echo "<script language='javascript' type='text/javascript'>
        alert('Dados Cadastrados'); window.location.href='../screens/forms/classRoom_form.php';</script>";
  }else if($function = 'editar'){
    $id_classRoom = $_GET['id_classRoom'];
    $u -> updateClassRoom( $id_classRoom, $class,$chairLength,$chairWidth, $id_user);
  }


}else if(isset($_GET['id_classRoom']) && !empty($_GET['id_classRoom'])){
  echo 'entrou';
  $id_classRoom = $_GET['id_classRoom'];
  $u -> deleteClassRoom($id_classRoom);
  echo "<script language='javascript' type='text/javascript'>
  alert('Dados Deletados'); window.location.href='../screens/class/class.php';</script>";
}


?>