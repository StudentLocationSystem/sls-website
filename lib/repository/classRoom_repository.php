<?php 

class ClassRoom {
    public function createClassRoom($class,  $chairLength, $chairWidth, $id_user){
        global $pdo;
        $sql = $pdo-> prepare("INSERT INTO classRoom (class, chairLength, chairWidth, userFK)
                               VALUES ( '$class', '$chairLength', '$chairWidth', '$id_user')");
        $sql-> execute();
    }
    public function updateClassRoom($id, $class,  $chairLength, $chairWidth,$id_user){
        global $pdo;
        $sql = $pdo-> prepare("UPDATE classRoom SET id = '$id', class = '$class', chairLength = '$chairLength', chairWidth = '$chairWidth', userFK = '$id_user' 
        WHERE id = :id");
        $sql -> bindValue('id', $id);
        $sql-> execute();
    }
    
    public function deleteClassRoom($id_classRoom){
        global $pdo;
        $sql = $pdo-> prepare("DELETE FROM classRoom WHERE id = :id_classRoom");
        $sql -> bindValue('id', $id_classRoom);
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