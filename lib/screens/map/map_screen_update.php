<?php
include '../menu/menu.php';
require '../../repository/map_repository.php';
require '../../repository/classRoom_repository.php';
require  '../../repository/student_repository.php';
$u = new Map();
$g = new ClassRoom();
$classStudentFK = $_GET['classStudentFK'];
$string = $_GET['map'];
$map = $u->explodeString($string);
?>

<head>
    <title>Cards Demo - Student Location System</title>

    <link rel="stylesheet" type="text/css" href="../components/style_form.css">

    <link rel="stylesheet" href="../components/style_menu.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<style type="text/css">
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');

/* Formulário  */
@media (min-width: 1300px) and (max-width: 1900px) {
.form-update {
    top: 57%;
    left: 65%;
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

/* Configuração da animação 2600px -> Media  */
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

.button-open {
    height: 0;
    width: 0;
}

.button-open i {
    height: 0;
    width: 0;
    color: transparent;
}

.button-open.active {
    transition: 0.4s;
    top: 85%;
    left: 90%;
    position: fixed;
    height: 50px;
    width: 50px;
    background-color: #451d5c;
    border-radius: 50%;
}

.button-open.active i {
    transition: 0.2s;
    color: white;
    margin: 14.5px;
    font-size: 20px;
}

/*  Fim do form */

.content-room{
    /*width: 2200px;*/
    padding-bottom: 40px;
    margin-top: 100px;
    /*margin-left: 240px;*/
    left: 0;
    overflow-x: scroll;
}
.title h2{
    font-size: 26px;
    font-family: 'Poppins';
}
.spacer-room{
    margin: 0 35px 5px 35px;
}
.card-room{
    /*width: 100%;*/
    padding-bottom: 20px;
}
.row-card {
    display: flex;
    width: 100%;
    border-radius: 10px;
}
.card-studants{
    margin: 10px 15px;
    min-width: 129.9px;
    max-width: 130px;
    min-height: 140px;
    padding-bottom: 5px;
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
    padding: 5px 0;
    text-align: center;
    background-color: #451d5c;
    border-top-left-radius: 5px;
    border-top-right-radius: 5px;
    color: white;
}

#title {
    text-align: center;
    padding: 5px;
    font-size: 14px;
    font-weight: bold;
    font-family: 'Poppins';
}

.button-action {
    outline: none;
    border: none;
    color: #fff;
    cursor: pointer;
    margin: 35px 0 0 10px;
    font-size: 16px;
    padding: 12.5px 30px;
    border-radius: 5px;
    margin-right: 10px;
}

.save {
    background-color: #451d5c;
    /*box-shadow: 1px 2px 15px #2a6e78;*/
}
.message-error{
    display:none;
}
.message-error.active{
    border: 1px solid #f54563;
    position: fixed;
    top: 90px;
    margin:  0 10px;
    background-color: pink;
    border-top-left-radius: 8px;
    border-bottom-left-radius: 8px;
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
    display:  flex;
    animation: closeMenssage 0.5s;
}
#alert.alert-danger{
    color:  red;
    font-family: 'Poppins';
    font-size: 18px;
    height:  100%;
    padding:15px  80px;
}
.btn-close{
    padding:  15px 20px;
    border-top-right-radius: 8px;
    border-bottom-right-radius: 8px;
    background-color: #f60c49;
    border: none;
    cursor: pointer;
}
.btn-close i{
    font-size: 25px;
    color: white;
}
@keyframes closeMenssage{
    from{
        transform: translateX(-1000px);
    }
    to{
        transform: translateX(0);
    }
}
</style>

<body>


<div class="main-content">
    <header>
        <div class="search-wrapper title">
            <h2 style="font-size: 24px;">Atualizar dados do mapeamento</h2>
        </div>
    </header>
<div>
<div class="content-room">
    <div class="spacer-room">
        <div class="card-room">
            <div class="message-error">
                <p id="alert"></p>
                <button class="btn-close"><i class="far fa-times-circle"></i></button>
            </div>
            <div class="form-update">
                <?php
                if (isset($map) && !empty($map)) {
                    $sql = $g->toStringClass($classStudentFK);
                    $class = $sql->fetch(PDO::FETCH_ASSOC);
                    $c = 1;
                    ?>
                     <div class="title-and-button-close">
                        <h2>Troca de carteiras</h2>
                        <div class="button-close">
                            <button>X</button>
                        </div>
                    </div>
                    <form action="../../models/map_models.php" method="POST">
                        <div class="row-update">
                            <div class="input-float">
                                <input type="number" placeholder="1 número" name="student1" id="student1"/>
                                <input type="number" placeholder="2 número" name="student2" id="student2" />
                                <input type="hidden" name="map" value="<?php echo $string; ?>">
                                <input type="hidden" name="classSize" value="<?php echo$class['classSize'];?>"  id="classSize"/>
                                <input type="hidden" name="classStudentFK" value='<?php echo $classStudentFK ?>'>
                                <input type="hidden" name="function" value="change">
                            </div>
                            <p id="alert"></p>
                            <div class="button-float">
                                <button class="button-update" value="Enviar" id="submit"> Enviar</button>
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

                    <form action="../../models/map_models.php" method="POST">
                        <input type="hidden" name="function" value="cadastrar">
                        <input type="hidden" name="id_class" value="<?php echo $classStudentFK ?>">
                        <input type="hidden" name="map" value="<?php echo $string ?>">
                        <div>
                            <input type="submit" class="button-action save" >
                        </div>

                    </form>
                    <?php
                } else {
                    echo "<tr><td colspan='5'><center>Nenhuma aluno cadastrado.</center></td></tr>";
                }
        ?>

        </div>
    </div>
</div>
</div>
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

        $(document).ready(function() {
            $('#submit').click(function() {
                var student1 = parseFloat(document.getElementById("student1").value);
                var student2 = parseFloat(document.getElementById("student2").value);
                var classSize =parseFloat(document.getElementById("classSize").value);
                var student11 = $('#student1').val();
                var student22 = $('#student2').val();
                $('#alert').html('');
                if(student11 == '' || student22 == ''){
                $('#alert').html('Preencher os valores.');
                $('#alert').addClass("alert-danger");
                $('.message-error').addClass("active");
                    $('.active').click(function() {
                        $('.message-error').removeClass("active");
                    });
                return false;               
                }
                 $('#alert').html('');
                if(student1 > classSize || student2 > classSize || student1 <= 0 || student2 <= 0){
                $('#alert').html('Valor da carteira não existe');
                $('#alert').addClass("alert-danger");
                $('.message-error').addClass("active");
                    $('.active').click(function() {
                        $('.message-error').removeClass("active");
                    });
                return false;   
                } 
                $('#alert').html('');
            })
        });
</script>
</body>