<?php
include '../menu/menu.php';
require '../../repository/map_repository.php';
require '../../repository/connection.php';
$u = new Map();

$classStudentFK = $_GET['id_classRoom'];

$priority1 = $u->scramble(1, $classStudentFK);
$priority2 = $u->scramble(2, $classStudentFK);
$priority3 = $u->scramble(3, $classStudentFK);
$priority4 = $u->scramble(4, $classStudentFK);
$priority5 = $u->scramble(5, $classStudentFK);
$map = $u->getMap($priority1, $priority2, $priority3, $priority4, $priority5, $classStudentFK);
$string = $u->implodeArray($map);


?>

<head>
    <title>Cards Demo - Student Location System</title>

    <link rel="stylesheet" type="text/css" href="../components/style_form.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body>
    <div class="main-content">
        <main>
            <div class="body">
                <div class="wrapper">
                    <form action="../../models/map_models.php" method="POST">
                        <?php print_r($map);?>
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
        </main>
    </div>
</body>

