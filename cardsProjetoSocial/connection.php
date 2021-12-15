<?php 

$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "";

$connect = new mysqli($localhost, $username, $password, $dbname);

if($connect->connect_error) {
	die("Erro de conexao : " . $connect->connect_error);
} else {
	// echo "Conectado com sucesso";
}

?>