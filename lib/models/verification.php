<?php
echo $_SESSION['id_userLogged'];
if(isset($_SESSION['id_userLogged']) || !empty($_SESSION['id_userLogged'])){

    $u = new User();

    $list = $u->logged($_SESSION['id_userLogged']);
    $user = $list['user'];
    }else{
        echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário não logado'); window.location.href= '../login/login.php';</script>";
    }

?>