<?php 
require '../repository/connection.php';
require '../repository/map_repository.php';
$u = new Map();
if(isset($_POST['map']) && !empty($_POST['map'])){
    $map = addslashes($_POST['map']);   
    $function = addslashes($_POST['function']);
    $id_user = $_SESSION['id_userLogged'];
    if($function == 'cadastrar'){
        $id_class = addslashes($_POST['id_class']);
        $u -> createMap($map, $id_user, $id_class);
        echo "<script language='javascript' type='text/javascript'>
        alert('Dados Cadastrados'); window.location.href='../screens/home/home.php';</script>";
    }else if($function == 'change'){
        $classStudentFK = addslashes($_POST['classStudentFK']);
        $string = addslashes($_POST['map']);
        $student1 = addslashes($_POST['student1']);
        $student2 = addslashes($_POST['student2']);
        $map = $u -> explodeString($string);
        $map = $u -> changeStudent($map, $student1, $student2);
        $string = implode(', ', $map);
        $classStudentFK = str_replace(PHP_EOL, '', $classStudentFK);
        $map = str_replace(PHP_EOL, '', $map);
        $url = "../screens/map/map_screen_update.php?classStudentFK=$classStudentFK&map=$string";
        $url = str_replace(PHP_EOL, '', $url);
        header("Location: $url");

    }
}else if(isset($_GET['idMap']) && !empty($_GET['idMap'])){
    $idMap = $_GET['idMap'];
    $u-> deleteMap($idMap);
    echo "<script language='javascript' type='text/javascript'>
    alert('Dados Cadastrados'); window.location.href='../screens/home/home.php';</script>";
}

?>