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
   
  if($function = 'logar'){
    $u -> loginUser($email, $pass);
  }
}

?>