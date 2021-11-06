 <?php 
 	require '../conexao/conexao.php';  
    require 'header.php';
    require 'components/functions_bd.php';
    $u = new Functions();
    $x = 6;
   	$y = 7;
   	$sala = $x*$y;
   	$array = array();
    $countP1 = 0;
    $countP2 = 0;
    $countP3 = 0;
    $countP4 = 0;
    $qtdL = 1;
    $mostrar = $u-> getAlunos();
    $P1 =$u-> scramble(1);
    $sizeP1 = sizeof($P1);
    $P2 =$u-> scramble(2);
    $sizeP2 = sizeof($P2);
    $P3 =$u-> scramble(3);
    $sizeP3 = sizeof($P3);
    $P4 =$u-> scramble(4);
	$sizeP4 = sizeof($P4);


	for ($i = 0; $i < $sizeP1; $i++) {
		//echo $i;
                    for ($j = 1; $j < $sala; $j++) { 
                        if ($j % $x == 0 && $mostrar[$j] == 'vazio' && $countP1 < $sizeP1) {
                        	//echo "entrou";
                            $mostrar[$j] = $P1[$i];
                            $countP1++;
                            break;

                        }
                        if ($j == $qtdL && $mostrar[$j] == 'vazio' && $countP1 < $sizeP1) {
                        	//echo "entrou";
                            $mostrar[$j] = $P1[$i];
                            $qtdL = $qtdL + $x;
                            $countP1++;
                            break;
                        }
                    }
                }
       $qtdL = 1;
       for ($i = 0; $i < $sizeP2; $i++) {
		//echo $i;
                    for ($j = 1; $j < $sala; $j++) { 
                        if ($j % $x == 0 && $mostrar[$j] == 'vazio' && $countP2 < $sizeP2) {
                        	//echo "entrou";
                            $mostrar[$j] = $P2[$i];
                            $countP2++;
                            break;

                        }
                        if ($j == $qtdL && $mostrar[$j] == 'vazio' && $countP2 < $sizeP2) {
                        	//echo "entrou";
                            $mostrar[$j] = $P2[$i];
                            $qtdL = $qtdL + $x;
                            $countP2++;
                            break;
                        }
                        if ($j > $qtdL && $j < ($qtdL + ($x - 1)) && $countP2 < $sizeP2 && $mostrar[$j] == 'vazio') {
                        	if ($j == $qtdL + $x -2) {
                        		$qtdL = $qtdL + $x;
                        	}
                        	$mostrar[$j] = $P2[$i];
                            $countP2++;
                            break;
                        }
                    }
        }
        for ($i = 0; $i < $sizeP3; $i++) {
		//echo $i;
                    for ($j = 1; $j < $sala; $j++) { 
                        if ($j % $x == 0 && $mostrar[$j] == 'vazio' && $countP3 < $sizeP3) {
                        	//echo "entrou";
                            $mostrar[$j] = $P3[$i];
                            $countP3++;
                            break;

                        }
                        if ($j == $qtdL && $mostrar[$j] == 'vazio' && $countP3 < $sizeP3) {
                        	//echo "entrou";
                            $mostrar[$j] = $P3[$i];
                            $qtdL = $qtdL + $x;
                            $countP3++;
                            break;
                        }
                        if ($j > $qtdL && $j < ($qtdL + ($x - 1)) && $countP3 < $sizeP3 && $mostrar[$j] == 'vazio') {
                        	if ($j == $qtdL + $x -2) {
                        		$qtdL = $qtdL + $x;
                        	}
                        	$mostrar[$j] = $P3[$i];
                            $countP3++;
                            break;
                        }
                    }
        } 

        for ($i = $countP1 + 1; $i < $sizeP1; $i++) {
                    for ($j = 1; $j < $sala; $j++) {

                        if ($mostrar[$j] == 'vazio' && $countP1 < $sizeP1) {
                            $mostrar[$j] = $P1[$i];
                            $countP1++;
                            break;
                        }

                    }
                }       
        for ($i = 0; $i < $sizeP4; $i++) {
                    for ($j = 1; $j <= $sala; $j++) {

                        if ($mostrar[$j] == 'vazio' && $countP4 < $sizeP4) {
                            $mostrar[$j] = $P4[$i];
                            $countP4++;
                            break;
                        }

                    }
                }  

                echo $sizeP1;
                echo $countP1;

                echo $sizeP2;
                echo $countP2;

                echo $sizeP3;
                echo $countP3;


                echo $sizeP4;
                echo $countP4;
       ?>

       <div class="row row-cols-2 row-cols-md-6 g-4">
  <?php for($i =1; $i <= $sala; $i++){?>
  	<div class="col">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title"><?php echo $mostrar[$i]?></h5>
  </div>
</div>
</div>
  <?php }  ?>
</div>




     