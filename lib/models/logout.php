<?php 
require '../repository/connection.php';
echo $_SESSION['id_userLogged'];
if(isset($_SESSION['id_userLogged']) || !empty($_SESSION['id_userLogged'])){
    echo 'entrou';
    unset($_SESSION['id_userLogged']);
    echo  "<script language='javascript' type='text/javascript'>
    alert('Usuário deslogado'); window.location.href= '../screens/login/login.php';</script>";
}

?>