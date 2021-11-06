<?php 
   require '../../conexao/conexao.php';
   require '../components/functions_bd.php';
   require '../components/mensagens.php';  
   	$update = new Functions();
   if(isset($_POST['aluno']) && !empty($_POST['aluno']) && isset($_POST['sala']) 
    && !empty($_POST['sala']) && isset($_POST['visao']) && !empty($_POST['visao']) 
    && isset($_POST['altura']) && !empty($_POST['altura'])){
   	echo "nao entrou";
  	$aluno =addslashes($_POST['aluno']);
    $sala =addslashes($_POST['sala']);
    $visao =addslashes($_POST['visao']);
    $altura =addslashes($_POST['altura']);
    $update -> createAluno($aluno, $sala, $visao,$altura);
    echo $cadastroAlunoSucess;
}



 ?>