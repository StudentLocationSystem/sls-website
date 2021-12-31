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

    body {
        background-color: #f1f5f9;
    }

    main h2 {
        font-size: 26px;
        color: grey;
    }
    @media (min-width: 1200px) {
    .container-card {
        background-color: #fff;
        width: 100%;
    }
    }
    .row-card {
        display: flex;
        width: 100%;
        border-radius: 10px;
    }
    .row-title {
        display: flex;
        margin-top: 60px;
        margin-bottom: 30px;
        justify-content: space-between;
    }

    .button-action {
        color: #fff;
        cursor: pointer;
        font-size: 18px;
        padding: 10px 25px;
        border-radius: 5px;
        margin-right: 10px;
    }

    .save {
        background-color: #451d5c;
        /*box-shadow: 1px 2px 15px #2a6e78;*/
    }

    .row-card .card-studants {
        margin: 20px;
        max-width: 200px;
        width: 100%;
        min-height: 140px;
        background-color: #fff;
        box-shadow: 1px 1px 6px #232323;
        border-radius: 5px;
    }

    .body-titles {
        width: 100%;
        height: 100%;
        /*background-color: blue;*/
        margin: 0;
        padding: 0;
    }

    #aling-item #fixed {
        font-size: 16px;
        font-weight: bold;
        padding: 10px 0;
        text-align: center;
        background-color: #451d5c;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
        color: white;
    }

    #title {
        text-align: center;
        margin: 5px;
        font-size: 16px;
        font-weight: bold;
        font-family: 'Poppins';
    }
    @media (min-width: 2600px){
    .form-update{
        top: 70%;
        left: 70%;
    }
    }
    @media (max-width: 2599px){
    .form-update{
        top: 60%;
        left: 68%;
    }
    }
    .form-update {
        max-width: 450px;
        width: 100%;
        padding: 0 auto;
        background-color: #fff;
        position: fixed;
        margin: 0;
        border-radius: 5px;
        border: 6px solid #451d5c;
    }
    /* Cponfiguração da animação 2600px -> Media  */
    .form-update.open {
        opacity: 1;
        transition: 0.3s;
    }
    .form-update.close {
        opacity: 0;
        transition: 1s;
        transform: translateX(2600px);
    }

    .title-and-button-close {
        display: flex;
        justify-content: space-between;
    }

    .form-update h2 {
        color: #451d5c;
        padding-left: 15px;
        padding-top: 15px;
        font-size: 26px;
    }

    .button-close {
        margin: 20px 15px;
    }

    .button-close button {
        cursor: pointer;
        padding: 10px 15px;
        border-radius: 50%;
        background-color: pink;
        color: red;
        border: none;
        font-weight: bold;
    }

    .row-update {
        display: flex;
        padding: 10px 20px;
    }
    .input-float input {
        padding: 10px 10px;
        margin-bottom: 20px;
        font-size: 18px;
        border-radius: 5px;
        border: 3px solid #451d5c;
    }

    .button-float {
        cursor: pointer;
        margin-top: 80px;
        height: 45px;
        width: 140px;
        background-color: #451d5c;
        color: white;
        text-align: center;
        cursor: pointer;
        border-radius: 5px;
    }
    .button-float button {
        margin-top: 8px;
        font-size: 18px;
        color: white;
        background-color: transparent;
        border: none;
    }
    .button-open{
        height: 0;
        width: 0;
    }
    .button-open i{
        height: 0;
        width: 0;
        color: transparent;
    }
    .button-open.active{
        transition:  0.4s;
        top:  85%;
        left: 90%;
        position: fixed;
        height: 50px;
        width: 50px;
        background-color: #451d5c;
        border-radius: 50%;
    }
    .button-open.active i{
        transition:  0.2s;
        color:  white;
        margin: 14.5px;
        font-size: 20px;
    }
</style>

<body>
    <div class="main-content">

        <main>
            <div class="row-title">
                <h2>Mapeamento</h2>
                <div>
                    <a class="button-action save" href="../../models/student_models.php?id_student=<?php echo $row['id'] ?>&id_classRoom=<?php echo $classStudentFK ?>">Salvar</a>
                </div>
            </div>
            <div class="container-card">
                <?php

                $sql = $s->toStringStudent($classStudentFK);
                if ($sql->rowCount() > 0) {
                    $sql = $g->toStringClass($classStudentFK);
                    $class = $sql->fetch(PDO::FETCH_ASSOC);
                    $map = $u->getMap($classStudentFK);
                    $string = $u->implodeArray($map);
                    $c = 1; ?>
                    <div class="form-update">
                        <div class="title-and-button-close">
                            <h2>Troca de carteiras</h2>
                            <div class="button-close">
                                <button>X</button>
                            </div>
                        </div>
                        <form action="../../models/map_models.php" method="POST">
                            <div class="row-update">
                                <div class="input-float">
                                    <input type="number" placeholder="1 número" name="student1" />
                                    <input type="number" placeholder="2 número" name="student2" />
                                    <input type="hidden" name="map"  value="<?php echo $string; ?>">
                                    <input type="hidden" name="classStudentFK" value='<?php echo $classStudentFK ?>'>
                                    <input type="hidden" name="function" value="change">
                                </div>
                                <div class="button-float">
                                    <button class="button-update">Editar</button>
                                </div>
                            </div>
                            </form>
                    </div>

                    <div class="button-open">
                        <buton>
                            <i class="fas fa-sync-alt"></i>
                        </buton>
                    </div>
                    
                    <?php
                    for ($i = 1; $i <= $class['chairLength']; $i++) {
                        echo '<div class="row-card">';
                        for ($j = 1; $j <= $class['classSize']; $j++) {
                    ?>
                            <div class="card-studants">
                                <div class="body-titles">
                                    <div id="aling-item">
                                        <p id="fixed"><?php echo $c ?></p>
                                    </div>
                                    <p id="title"><?php echo $map[$c] ?></p>
                                </div>
                            </div>


                    <?php $c++;
                            if ($j % $class['chairWidth'] == 0) {

                                echo '</div>';
                                break;
                            }
                        }
                    } ?>
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
                </div>
            </div>
        <?php
                } else {
                    echo "<tr><td colspan='5'><center>Nenhuma aluno cadastrado.</center></td></tr>";
                }
        ?>
            </div>
        </main>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function() {
        $('.button-close').click(function() {
        $('.form-update').addClass('close');
        $('.button-open').addClass('active')
    });
});
        $(document).ready(function() {
        $('.button-open').click(function() {
        $('.form-update').addClass('open');
        $('.form-update').removeClass('close');
        $('.button-open').removeClass('active');
    });
});
    </script>

</body>
