<?php

class User{
    public function validUser($user, $email){
        global $pdo;

        $sql = $pdo-> prepare("SELECT user FROM user WHERE user = :user OR email = :email");
        $sql-> bindValue('user', $user);
        $sql-> bindValue('email', $email);
        $sql-> execute();
            
        if($sql -> rowCount()>= 1){
        return false;
        }else if($sql -> rowCount() <= 0){
        return true;
        }
        }    
    public function createUser($user, $pass, $email){
        $u = new User();

        if($u -> validUser($user, $pass) == true){
        global $pdo;
        $passCrip= md5($pass);
        $sql = $pdo-> prepare("INSERT INTO user (user, pass, email, user, email)
                               VALUES ( '$user', '$passCrip', '$email')");
        $sql-> execute();

        }else{
            echo  "<script language='javascript' type='text/javascript'>
            alert('Usuário já existe'); window.location.href='../home.php';</script>";
        }
    }
    public function loginUser($user, $pass){
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM user WHERE user = :user AND pass = :pass");
        $sql -> bindValue('user', $user);
        $sql -> bindValue('pass', md5($pass));
        $sql-> execute();

        if ($sql-> rowCount()>0){
        $array = $sql-> fetch();
        $_SESSION['id_userLogged'] = $array['id'];
         echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário Logado'); window.location.href= '../indexsis.php';</script>";
        }else{
        echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário ou senha errados'); window.location.href= '../login.php';</script>";
        }
        }

    public function updateUser($user, $pass, $email, $id_user){
        global $pdo;
        $passCrip = md5($pass);
        $sql = $pdo-> prepare("UPDATE user SET user = '$user', pass = '$passCrip', email = '$email' 
        WHERE id = :id_user");
        $sql -> bindValue('id', $id_user);
        $sql-> execute();

        }
    public function deleteUser($id_user){
        global $pdo;
        $sql = $pdo-> prepare("DELETE FROM user WHERE id = :id_user");
        $sql -> bindValue('id', $id_user);
        $sql -> execute();
    }
}
?>