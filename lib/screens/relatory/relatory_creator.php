<?php
require '../../repository/map_repository.php';
require '../../repository/connection.php';
require '../../repository/classRoom_repository.php';
require  '../../repository/student_repository.php';
require 'fpdf/fpdf.php';
$u = new Map();
$g = new ClassRoom();
$s = new Student();
$classStudentFK = $_GET['id_classRoom'];
$idMap = $_GET['idMap'];

$sql = $g->toStringClass($classStudentFK);
$class = $sql->fetch(PDO::FETCH_ASSOC);

function toStringMap($idMap){
    global $pdo; 
    $sql = $pdo-> prepare("SELECT * FROM `map` WHERE idMap = :idMap");
    $sql -> bindValue('idMap', $idMap);
    $sql -> execute();
    
$u = new Map();
$result = $sql->fetch(PDO::FETCH_ASSOC);
$map = $u -> explodeString($result['map']);
return $map;
}




class RPDF extends FPDF {
    function vcell($c_width,$c_height,$x_axis,$text){
        $w_w=$c_height/3;
        $w_w_1=$w_w;
        $w_w1=$w_w+$w_w+$w_w/2;
        $w_w2=$w_w+$w_w+$w_w+$w_w;
        $len=strlen($text);
    
        $lengthToSplit = $c_width/2 - 2;
        if($len>$lengthToSplit){
        $w_text=explode(" ", $text);
        $this->SetX($x_axis);
        $this->Cell($c_width,$w_w_1,$w_text[0],'',0,'C',0);
      
        if(isset($w_text[1])) {
            $this->SetX($x_axis);

            $this->Cell($c_width,$w_w1,$w_text[1],'',0,'C',0);
          
        }
        if(isset($w_text[2])) {
            
            $this->SetX($x_axis);
            $this->Cell($c_width,$w_w2,$w_text[2],'',0,'C',0);
           
            
        }
        $this->SetX($x_axis);
        $this->Cell($c_width,$c_height,'','LTRB',0,'C',0);
        }
        else{
            $this->SetX($x_axis);
            $this->Cell($c_width,$c_height,$text,'LTRB',0,'C',0);
            
        }
            }
         }

         


$pdf = new RPDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetAutoPageBreak(false,0);
$pdf->SetFont('Arial','',11);


$pdf->SetXY(0,5);
$pdf->MultiCell(2, 30,'',1,'J', true);

$pdf->SetXY(64,5);
$pdf->MultiCell(80,30,'MESA',1,'C',false);


$j = 1;

$l = 210 / $class['chairWidth'];
$a = 295/$class['chairLength'];
$w = (210-(2*$class['chairWidth']))/$class['chairWidth'];
$h = (250-(2*$class['chairLength']))/$class['chairLength'];
$x = 2;
$y = 40;
$n = 0;
for ($i=0; $i <$class['classSize'] ; $i++) { 
    $pdf->SetXY($x,$y);
   
    $pdf-> vcell($w,$h,$x,utf8_decode(toStringMap($idMap)[$i+1]));

    if (($i+1)%$class['chairWidth'] == 0) {
        $y = $y + 2 + round($h);
        $x = 2;
        $n = $n+1;
        
    }
    $aux = $i+1 -$n - (($n)*($class['chairWidth']-1)) ;
    if ($aux == 0) {
        $x = 2;
    }else{

        $x = $aux*  round($l) +2;
    }
}
//altura 40
$pdf->Output();


?>