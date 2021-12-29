<?php
require '../repository/connection.php';
require '../repository/user_repository.php';
$u = new User();
if( isset($_POST['pass']) 
&& !empty($_POST['pass']) && isset($_POST['email']) && !empty($_POST['email'])){
  $email =addslashes($_POST['email']);
  $pass = addslashes($_POST['pass']);
 $function = addslashes($_POST['function']);
   $function;
   
  if($function == 'logar'){
    $u -> loginUser($email, $pass);
  }
}else if(isset($_POST['password']) 
&& !empty($_POST['password']) && isset($_POST['email']) && !empty($_POST['email']) && isset($_POST['name']) 
&& !empty($_POST['name'])){
  $function = addslashes($_POST['function']);
  $user = addslashes($_POST['name']);
  $email =addslashes($_POST['email']);
  $password = addslashes($_POST['password']);
  if($function == 'cadastrar'){
    $u -> createUser($user, $password, $email);
  }
}

?>