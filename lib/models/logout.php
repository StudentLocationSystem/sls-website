<?php 
require '../repository/connection.php';
if(isset($_SESSION['id_userLogged']) || !empty($_SESSION['id_userLogged'])){
 
    unset($_SESSION['id_userLogged']);
    echo  "<script language='javascript' type='text/javascript'>
    alert('Usuário deslogado'); window.location.href= '../screens/login/login.php';</script>";
}

?>