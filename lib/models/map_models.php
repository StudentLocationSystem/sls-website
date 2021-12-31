<?php 
require '../repository/connection.php';
require '../repository/map_repository.php';
$u = new Map();
if(isset($_POST['map']) && !empty($_POST['map'])){
  
    echo 'entrou';
    $map = addslashes($_POST['map']);   
    $function = addslashes($_POST['function']);
    $id_user = $_SESSION['id_userLogged'];
    if($function == 'cadastrar'){
        $id_class = addslashes($_POST['id_class']);
        $u -> createMap($map, $id_user, $id_class);
        echo "<script language='javascript' type='text/javascript'>
        alert('Dados Cadastrados'); window.location.href='../screens/map/map_table.php';</script>";
    }else if($function == 'change'){
        $classStudentFK = addslashes($_POST['classStudentFK']);
        $string = addslashes($_POST['map']);
        $student1 = addslashes($_POST['student1']);
        $student2 = addslashes($_POST['student2']);
        $map = $u -> explodeString($string);
        $map = $u -> changeStudent($map, $student1, $student2);
        $string = implode(', ', $map);
        header("Location: ../screens/map/map_screen_update.php?map=".$string."&classStudentFK=".$classStudentFK);
    }
}else if(isset($_GET['idMap']) && !empty($_GET['idMap'])){
    echo 'entrou';
    
    $idMap = $_GET['idMap'];
    $u-> deleteMap($idMap);
}

?>