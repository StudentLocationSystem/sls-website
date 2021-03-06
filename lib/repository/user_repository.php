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
        $sql = $pdo-> prepare("INSERT INTO user (user, pass, email)
                               VALUES ( '$user', '$passCrip', '$email')");
     
        $sql-> execute();
        $u -> loginUser($email, $pass);
        echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário cadastrado'); window.location.href= '../screens/home/home.php';</script>";   
        }else{
            echo  "<script language='javascript' type='text/javascript'>
            alert('Usuário já existe'); window.location.href= '../screens/login/login.php';</script>";
        }
    }
    public function loginUser($email, $pass){
        global $pdo;
        $sql = $pdo->prepare("SELECT * FROM user WHERE email = :email AND pass = :pass");
        $sql -> bindValue('email', $email);
        $sql -> bindValue('pass', md5($pass));
        $sql-> execute();

        if ($sql-> rowCount()>0){
        $array = $sql-> fetch();
         $_SESSION['id_userLogged'] = $array['id'];
        echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário Logado'); window.location.href= '../screens/home/home.php';</script>";
        }else{
        echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário ou senha errados'); window.location.href= '../screens/login/login.php';</script>";
        }
        }
        public function logged($id){
            global $pdo;
            $array = array();

            $sql = "SELECT * FROM user WHERE id = :id";
            $sql = $pdo-> prepare($sql);
            $sql-> bindValue('id', $id);
            $sql-> execute();
            if($sql-> rowCount() > 0){
                $array = $sql-> fetch();
            }else{
                echo  "<script language='javascript' type='text/javascript'>
        alert('Usuário não logado'); window.location.href='../screens/login/login.php';</script>";
            }
            return $array;
        }
        public function logout($id_user){
            unset($_SESSION['id_userLogged']);
        }
    public function updateUser($user, $pass, $email, $id){
        global $pdo;
        $passCrip = md5($pass);
        $sql = $pdo-> prepare("UPDATE user SET user = '$user', pass = '$passCrip', email = '$email' 
        WHERE id = :id");
        $sql -> bindValue('id', $id);
        $sql-> execute();

        echo  "<script language='javascript' type='text/javascript'>
        alert('Dados Atualziados'); window.location.href='../screens/forms/user_update.php';</script>";

        }
    public function stringUser($id){
        global $pdo;
        $sql = $pdo-> prepare("SELECT * FROM user WHERE id = :id");
        $sql -> bindValue('id', $id);
        $sql -> execute();

        return $sql;
    }
 
    
}
?>