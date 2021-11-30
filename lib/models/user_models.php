<?php
require 'repository/user_repository.php';
$u = new User();
if(isset($_POST['user']) && !empty($_POST['user']) && isset($_POST['password']) 
&& !empty($_POST['password']) && isset($_POST['email']) && !empty($_POST['email'])){
  require_once '../Usuario.class.php';
  
  $user = addslashes($_POST['user']);
  $password =addslashes($_POST['password']);
  $email =addslashes($_POST['email']);
  $function =$_GET['function'];
  $id_user = $_GET['id_user'];

  if($function = 'cadastrar'){
    $u -> createUser($user, $password, $email);
  }else if($function = 'editar'){
    $u -> updateUser( $user,$pass,$email, $id_user);
  }else if($function = 'deletar'){
    $u -> deleteUser($id_user);
  }else if($function = 'logar'){
    $u -> loginUser($user, $password);
  }
}

?>