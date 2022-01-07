<?php 
class ClassRoom {
    public function createClassRoom($class,  $chairLength, $chairWidth, $id_user){
        $colorHex = sprintf('#%06x', mt_rand(0xDDDDDD, 0xFFFFFF));
        $classSize = $chairLength * $chairWidth;
        global $pdo;
        $sql = $pdo-> prepare("INSERT INTO classRoom (class, chairLength, chairWidth, classSize, userFK, colorHex)
                               VALUES ( '$class', '$chairLength', '$chairWidth', '$classSize', '$id_user', '$colorHex')");
        $sql-> execute();
    }
    public function updateClassRoom($id, $class,  $chairLength, $chairWidth,$id_user){
        $classSize = $chairLength * $chairWidth;
        global $pdo;
        $sql = $pdo-> prepare("UPDATE classRoom SET id = '$id', class = '$class', chairLength = '$chairLength', chairWidth = '$chairWidth', classSize = '$classSize', userFK = '$id_user' 
        WHERE id = :id");
        $sql -> bindValue('id', $id);
        $sql-> execute();
    }
    
    public function deleteClassRoom($classStudentFK){
        global $pdo;
        $sql = $pdo-> prepare("DELETE FROM students WHERE classStudentFK = :classStudentFK");
        $sql -> bindValue('classStudentFK', $classStudentFK);
        $sql -> execute();
        $classMapFK = $classStudentFK;
        $sql = $pdo-> prepare("DELETE FROM map WHERE classMapFK = :classMapFK");
        $sql -> bindValue('classMapFK', $classMapFK);
        $sql -> execute();
        $id = $classStudentFK;
        $sql = $pdo-> prepare("DELETE FROM classRoom WHERE id = :id");
        $sql -> bindValue('id', $id);
        $sql -> execute();
    }
    public function toStringClass( $id){
        global $pdo;
        $sql = $pdo-> prepare("SELECT * FROM classRoom WHERE id = :id");
        $sql -> bindValue('id', $id);
        $sql -> execute();
        return $sql;

    }
    public function toStringAllClass( $userFK){
        global $pdo;
        $sql = $pdo-> prepare("SELECT * FROM classRoom WHERE userFK = :userFK");
        $sql -> bindValue('userFK', $userFK);
        $sql -> execute();
        return $sql;
    }
}
?>