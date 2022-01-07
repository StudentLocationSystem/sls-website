<?php

class Student{
    public function createStudent($name,  $vision, $height, $acessibility, $id_user, $id){
      
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
        $sql = $pdo-> prepare("SELECT * FROM classRoom WHERE id = :id");
        $sql -> bindValue('id', $id);
        $sql -> execute();
        $row = $sql->fetch(PDO::FETCH_ASSOC);
       
        $classStudentFK = $id;
        $sqls = $pdo-> prepare("SELECT * FROM students WHERE classStudentFK = :classStudentFK");
         $sqls -> bindValue('classStudentFK', $classStudentFK);
      
        $sqls-> execute();
       
        if($sqls -> rowCount() >= $row['classSize']){
            echo "<script language='javascript' type='text/javascript'>
            alert('A quantidade de alunos está no máximo'); window.location.href='../screens/class/students_table.php?id_classRoom=".$id."';</script>";
        }else{
        $sql = $pdo-> prepare("INSERT INTO students (student, vision, height, acessibility, priority, userFK, classStudentFK)
                               VALUES ( '$name', '$vision', '$height', '$acessibility', '$priority', '$id_user', '$id')");
        $sql-> execute();
        }
    }
    public function updateStudent($id, $name,  $vision, $height, $acessibility,  $id_user, $id_classRoom){
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
        $sql = $pdo-> prepare("UPDATE students SET id = '$id', student = '$name', vision = '$vision', height = '$height', 
        acessibility = '$acessibility', priority = '$priority', userFK = '$id_user', classStudentFK = '$id_classRoom' 
        WHERE id = :id");
        $sql -> bindValue('id', $id);
        $sql-> execute();
    }
    public function deleteStudent($id){
        global $pdo;
        $sql = $pdo-> prepare("DELETE FROM students WHERE id = :id");
        $sql -> bindValue('id', $id);
        $sql -> execute();
    }

    public function toStringStudent($classStudentFK){
        global $pdo;
        $sql = $pdo-> prepare("SELECT * FROM students WHERE classStudentFK = :classStudentFK");
        $sql -> bindValue('classStudentFK', $classStudentFK);
        $sql -> execute();
        return $sql;
    }

    public function toStringAll($userFK){
        global $pdo;
        $sql = $pdo-> prepare("SELECT * FROM students WHERE userFK = :userFK");
        $sql -> bindValue('userFK', $userFK);
        $sql -> execute();
        return $sql;
    }
}

?>