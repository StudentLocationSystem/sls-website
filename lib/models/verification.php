<?php
if(isset($_SESSION['id_userLogged']) || !empty($_SESSION['id_userLogged'])){

    $u = new User();

    $list = $u->logged($_SESSION['id_userLogged']);
    $user = $list['user'];
    }else if (!isset($_SESSION['id_userLogged']) || empty($_SESSION['id_userLogged'])){
         echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário não logado'); window.location.href= '../login/login.php';</script>"; 
    }

?>