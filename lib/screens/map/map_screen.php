<?php
include '../menu/menu.php';
require '../../repository/map_repository.php';
require '../../repository/connection.php';
require '../../repository/classRoom_repository.php';
require  '../../repository/student_repository.php';
$u = new Map();
$g = new ClassRoom();
$s = new Student();
$classStudentFK = $_GET['id_classRoom'];
?>

<head>
    <title>Cards Demo - Student Location System</title>

    <link rel="stylesheet" type="text/css" href="../components/style_form.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');
    body{
        background-color: #f1f5f9;
    }
    main h2{
        font-size: 26px;
    }
    .row-card{
        display: flex;
        width: 100%; 
        border-radius: 10px;
    }
    .row-card .card-studants{
        margin: 20px;
        width: 200px;
        min-height: 170px;
        background-color: #fff;
        box-shadow: 1px 1px 6px #232323;
        border-radius: 5px;
    }
    .body-titles{
        width: 100%;
        height: 100%;
        /*background-color: blue;*/
        margin: 0;
        padding: 0;
    }

    #aling-item #fixed{
        font-size: 16px;
        font-weight: bold;
        padding: 10px 0;
        text-align: center;
        background-color: #451d5c;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        color: white;
    }
    #title{
        text-align: center;
        margin: 5px;
        font-size: 16px;
        font-weight: bold;
        font-family: 'Poppins';
    } 

</style>

<body>
    <div class="main-content">
        <main>
            <h2>Mapeamento</h2>
            <div class="row-card">
            <?php 

$sql = $s -> toStringStudent($classStudentFK);
 if ($sql -> rowCount() > 0) {

$sql = $g-> toStringClass($classStudentFK);
$class = $sql->fetch(PDO::FETCH_ASSOC);
 $map = $u->getMap($classStudentFK);

 $string = $u->implodeArray($map);

        
            $c = 1;
            for ($i=1; $i<=$class['chairLength'] ; $i++) { 
               echo '<div>';
            for ($j=1; $j<=$class['classSize']; $j++) { 
           ?>
            <div class="card-studants">
                <div class="body-titles">
                    <div id="aling-item"><p id="fixed"><?php echo $c ?></p></div>
                    <p id="title"><?php echo $map[$c] ?></p>
                </div>
            </div>
          

        <?php $c++; if ($j % $class['chairWidth'] == 0) {
     
             echo '</div>';
             break;
        }}} ?>
        </div>
            <div class="body">
                <div class="wrapper">
                    <form action="../../models/map_models.php" method="POST">
                        
                        <?php print_r($map); ?>
                        <input type="hidden" name="function" value="cadastrar">
                        <input type="hidden" name="id_class" value="<?php echo $classStudentFK ?>">
                        <input type="hidden" name="map" value="<?php echo $string ?>">
                        <div class="input-box button">
                            <input type="Submit" value="Enviar">
                        </div>
              
                </form>
            
           <!--  <form action="" method="POST">
                <div class="user-details">
                    <div class="input-box ">
                        <span class="details">Aluno 1</span>
                        <input type="number" name="student1" value="">
                    </div>

                    <div class="input-box ">
                        <span class="details">Aluno 2</span>
                        <input type="number" name="student2" value="">
                    </div>
                  
                </div>
                <div class="input-box button">
                            <input type="Submit" id="submit" name="change">
                        </div>
            </form> -->
         
            </div>
            </div>
            <?php 
            }else{
       echo "<tr><td colspan='5'><center>Nenhuma aluno cadastrado.</center></td></tr>";
            }
            ?>
        </main>
    </div>
</body>

