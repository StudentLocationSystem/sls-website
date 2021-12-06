<?php

class Student{
    public function createStudent($name,  $vision, $height, $acessibility, $id_user, $id_classRoom){
        if($acessibility == 1){
            $priority =1;
        }elseif ($vision == 1 && $height == 1) {
            $priority = 2;
            }elseif ($vision == 1 && $height == 2) {
            $priority = 3;    
            }elseif ($vision == 2 && $height == 2 ) {
            $priority = 4;
            }elseif ($vision == 2 && $height == 1) {
            $priority = 5;
            }
        global $pdo;
        $sql = $pdo-> prepare("INSERT INTO students (student, vision, height, acessibility, priority, userFK, classStudentFK)
                               VALUES ( '$name', '$vision', '$height', '$acessibility', '$priority', '$id_user', '$id_classRoom')");
        $sql-> execute();
    }
    public function updateStudent($id, $name,  $vision, $height, $acessibility, $priority, $id_user, $id_classRoom){
        global $pdo;
        $sql = $pdo-> prepare("UPDATE student SET id = '$id', name = '$name', vision = '$vision', height = '$height', 
        acessibility = '$acessibility', priority = '$priority', userFK = '$id_user', classStudentFK = '$id_classRoom' 
        WHERE id = :id");
        $sql -> bindValue('id', $id);
        $sql-> execute();
    }
    public function deleteStudent($id){
        global $pdo;
        $sql = $pdo-> prepare("DELETE FROM classRoom WHERE id = :id");
        $sql -> bindValue('id', $id);
        $sql -> execute();
    }
}

?>