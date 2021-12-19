<?php 
class ClassRoom {
    public function createClassRoom($class,  $chairLength, $chairWidth, $id_user){
        $colorHex = sprintf('#%06x', mt_rand(0xDDDDDD, 0xFFFFFF));
        
        global $pdo;
        $sql = $pdo-> prepare("INSERT INTO classRoom (class, chairLength, chairWidth, userFK, colorHex)
                               VALUES ( '$class', '$chairLength', '$chairWidth', '$id_user', '$colorHex')");
        $sql-> execute();
    }
    public function updateClassRoom($id, $class,  $chairLength, $chairWidth,$id_user){
        global $pdo;
        $sql = $pdo-> prepare("UPDATE classRoom SET id = '$id', class = '$class', chairLength = '$chairLength', chairWidth = '$chairWidth', userFK = '$id_user' 
        WHERE id = :id");
        $sql -> bindValue('id', $id);
        $sql-> execute();
    }
    
    public function deleteClassRoom($classStudentFK){
        global $pdo;
        $sql = $pdo-> prepare("DELETE FROM students WHERE classStudentFK = :classStudentFK");
        $sql -> bindValue('classStudentFK', $classStudentFK);
        $sql -> execute();
        $id = $classStudentFK;
        $sql = $pdo-> prepare("DELETE FROM classRoom WHERE id = :id");
        $sql -> bindValue('id', $id);
        $sql -> execute();
    }
    public function toString($id_user){
        global $pdo;
        $sql = $pdo-> prepare("SELECT * FROM classRoom WHERE userFK = :id_user");
        $sql -> bindValue('userFK', $id_user);
        $sql -> execute();
        return $sql;
    }
}
?>