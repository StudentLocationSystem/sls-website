<?php

class Functions{
    public function createAluno($aluno, $sala,$visao,$altura){
        global $pdo;
        if ($visao == 1 && $altura == 1) {
        $prioridade = 1;
        }elseif ($visao == 1 && $altura == 2) {
        $prioridade = 2;    
        }elseif ($visao == 2 && $altura == 2 ) {
        $prioridade = 3;
        }elseif ($visao == 2 && $altura == 1 ) {
        $prioridade = 4;
        }
        $sql = $pdo-> prepare("INSERT INTO aluno (aluno, visao, altura, sala, prioridade)
                                       VALUES ( '$aluno', '$visao', '$altura', '$sala', '$prioridade')");
        $sql-> execute();
}

    public function getAlunos(){
        global $pdo;
        $array = array();
        $i = 1;
        $sql = $pdo-> prepare("SELECT * FROM aluno");
        $sql-> execute();
        while ($row = $sql -> fetch(PDO::FETCH_ASSOC)){

            $array[$i] = 'vazio';
            $i++;
        }
        return $array;
    }

    public function scramble($prioridade){
        global $pdo;
        $array = array();
        $i = 0;
        $aux =0;
        $sql = $pdo-> prepare("SELECT * FROM aluno WHERE prioridade = :prioridade");
        $sql-> bindValue('prioridade', $prioridade);
        $sql-> execute();
        while ($row = $sql -> fetch(PDO::FETCH_ASSOC)){
            $array[$i] = $row['aluno'];
            $i++;
        }
        $size =  sizeof($array);
        for ($i = 0; $i < $size; $i++) {
                    $r = rand(1, $size);
                    for ($j = 0; $j < $size -1; $j++) {
                        if ($j < $r || $j % $r == 0) {
                            $aux = $array[$j];
                            $array[$j] = $array[$j + 1];
                            $array[$j + 1] = $aux;
                           
                        }
                    }
        }
        
        return $array;
    }
    

    }
  ?>