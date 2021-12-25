<?php 
require '../repository/connection.php';
require '../repository/map_repository.php';
$u = new Map();
if(isset($_POST['map']) && !empty($_POST['map'])){
  
    echo 'entrou';
    $map = addslashes($_POST['map']);   
    $function = addslashes($_POST['function']);
    $id_user = $_SESSION['id_userLogged'];
    $id_class = addslashes($_POST['id_class']);

    if($function == 'cadastrar'){
        echo 'entrou';
        $u -> createMap($map, $id_user, $id_class);
    }
}else if(isset($_GET['idMap']) && !empty($_GET['idMap'])){
    echo 'entrou';
    $idMap = $_GET['idMap'];
    $u-> deleteMap($idMap);
}

?>