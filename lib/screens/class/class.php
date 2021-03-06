<?php 
include '../menu/menu.php'; 
include '../../repository/student_repository.php';
$u = new Student();
?>

<head>
    <title>Cards Demo - Student Location System</title>

    <link rel="stylesheet" type="text/css" href="../components/style_class.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700;800;900&display=swap');

    .tooltip{
        border-radius: 50%; 
        margin-right: 6px;
    }
    .item-action:hover{
        height: 100%;
        width: 100%;
    }
    .button-action{
        border: none;
        color: #fff;
        font-size: 14px;
        padding: 5px 20px;
        border-radius: 5px;
        margin-right: 10px;
    }
    .redirect{
        background-color: #451d5c;
    }
</style>


    <div class="main-content">
 
    <header>
        <div class="search-wrapper title">
            <h2 style="font-size: 24px;">Salas</h2>
        </div>
        <a class="button-action redirect" href='../forms/classRoom_form.php'>Nova sala</a>  
    </header>
<main>
        <div class="container">
            <div class="row">
                <?php
                global $pdo;
                $userFK = $_SESSION['id_userLogged'];
                $sql = $pdo->prepare("SELECT * FROM classRoom WHERE userFK = :userFK");
                $sql->bindValue('userFK', $userFK);
                $sql->execute();
                
                if ($sql->rowCount() > 0) {

                    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                        $sqla = $u -> toStringStudent($row['id']);
                $countStudents = $sqla -> rowCount();
                        echo "
            <a href='students_table.php?id_classRoom=".$row['id']."'>
            <div class='sala'>
            
            <div class='card bg-c-blue order-card' style='background-color: #451d5c; box-shadow: 0px 2px 6px #451d5c;'>
                
                <div class='card-room' style='padding: 5px 0 15px 0;'>
                    <div style='display: flex; justify-content: space-between;' >
                    <div style='display: block;'>
                    <h1 style='padding: 0 20px; font-size: 40px; color: white;'  title='" . $row['class'] . "'>" . $row['class'] . "</h1>
                    <p style='padding: 0 20px; font-size: 18px; font-weight: normal; color: #999;'  title='" . $row['class'] . "'>". $countStudents . " alunos</p>
                    </div>
                    <div >
                        <h1 style='padding: 0px 20px; font-size: 60px; color: white;'  title='" . $row['class'] . "'>" . $row['chairWidth'] . "x" . $row['chairLength'] . "</h1>
                    </div>
                    </div>

                    <div style='padding: 30px 20px 0 20px;'>

                    <a class='button-card' href='../forms/student_form.php?id_classRoom=" . $row['id'] . "'>
                    <div class='tooltip' style='padding: 7px 6px; border: 2px solid #0c8f8f; font-size: 15px;'>
                        <div class='item-action'><i class='fas fa-user-plus' style='color: #0c8f8f;'></i></div>
                        <span class='tooltiptext'>Cadastrar Aluno</span>
                    </div>
                    </a>

                    <a class='button-card' href='../map/map_screen.php?id_classRoom=".$row['id']."'>
                    <div class='tooltip' style='padding: 7px 7px; border: 2px solid #a3e3b1; font-size: 15px;'>
                        <div class='item-action'><i class='fas fa-map' style='color: #a3e3b1;'></i></div>
                        <span class='tooltiptext'>Mapeamento</span>
                    </div>
                    </a>
                    <a class='button-card' href='../forms/classRoom_update_form.php?id_classRoom=" . $row['id'] . "'>
                    <div class='tooltip' style='padding: 7px 8px; border: 2px solid #ffc018; font-size: 15px;'>
                        <div class='item-action'><i class='fas fa-pen' style='color: #ffc018;'></i></div>
                        <span class='tooltiptext'>Editar</span>
                    </div>
                    </a>
                    <a href='../../models/classRoom_models.php?id_classRoom=" . $row['id'] . "'>
                    <div class='tooltip' style='padding: 6px 9px; border: 2px solid #f60c49; font-size: 15px;'>
                        <div class='item-action'><i class='fas fa-trash' style='color: #f60c49; '></i></div>
                        <span class='tooltiptext'>Excluir</span>
                    </div>
                    
                    </a>
                    </div>
            </div>
            </div>
        </div> 
        </a>";
                    }
                } else {
                    echo "<tr><td colspan='5'><center>Nenhuma sala cadastrada.</center></td></tr>";
                }
                ?>

            </div>
        </div>
        <div>
        <!-- <div class="floatingButton">
                <a href='../forms/classRoom_form.php'>
                <h1 class="m-b-20"><i class="fas fa-plus" style="font-size: 20px;"></i> Nova sala
                </h1>
            </a>  
        </div> -->
            </main>
    </div>
</body>