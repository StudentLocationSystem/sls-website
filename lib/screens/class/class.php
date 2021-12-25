<?php require_once '../../repository/connection.php';
include '../menu/menu.php'; 
?>

<head>
    <title>Cards Demo - Student Location System</title>

    <link rel="stylesheet" type="text/css" href="../components/style_class.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body>

    <div class="main-content">
        <div class="container">
            <div class="row">
                <?php
                global $pdo;
                $userFK = $_SESSION['id_userLogged'];
                $sql = $pdo->prepare("SELECT * FROM classroom WHERE userFK = :userFK");
                $sql->bindValue('userFK', $userFK);
                $sql->execute();

                if ($sql->rowCount() > 0) {

                    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) {
                        echo "
            <a href='students_table.php?id_classRoom=" . $row['id'] . "'>
                    <div class='sala'>
            <div class='card bg-c-blue order-card' style='background-image: linear-gradient(" . $row['colorHex'] . ", rgb(60,60,60));'>
                <div class='card-block'>
                    <h1 class='m-b-20 title' title='" . $row['class'] . "'>" . $row['class'] . "</h1>
                    <h2 class='text-right f-right'>
                    <a class='button-card' href='../forms/student_form.php?id_classRoom=" . $row['id'] . "'>
                    <div class='tooltip'><i class='fas fa-user-plus'></i>
                        <span class='tooltiptext'>Cadastrar Aluno</span>
                    </div>
                </a>
                    <a class='button-card' href='../map/map_screen.php?id_classRoom=".$row['id']."'>
                    <div class='tooltip'><i class='fas fa-map'></i>
                    <span class='tooltiptext'>Gerar Mapeamento</span>
                    </div>
                    </a>
                        <a class='button-card' href='../forms/classRoom_update_form.php?id_classRoom=" . $row['id'] . "'>
                            <div class='tooltip'><i class='fas fa-pen'></i>
                                <span class='tooltiptext'>Editar</span>
                            </div>
                        </a>
                        <a class='button-card' href='../../models/classRoom_models.php?id_classRoom=" . $row['id'] . "'>
                            <div class='tooltip'><i class='fas fa-trash'></i>
                                <span class='tooltiptext'>Excluir</span>
                            </div>
                        </a>
                        
                    </h2>
                    <p class='m-b-0' title='Sala: " . $row['chairWidth'] . "x" . $row['chairLength'] . "'>Sala: " . $row['chairWidth'] . "x" . $row['chairLength'] . "<span class='f-right'></span></p>
                </div>
            </div>
        </div> 
        </a>";
                    }
                } else {
                    echo "<tr><td colspan='5'><center>Nenhuma sala cadastrada.</center></td></tr>";
                }
                ?>

                <div class="col-md-4 col-xl-3">
                    <div class="card bg-c-blue order-card" style="background: rgb(200,200,200);">
                        <div class="card-block">
                            <a class="button-card" href='../forms/classRoom_form.php'>
                                <center>
                                    <div class="tooltip">
                                        <h1 class="m-b-20"><i class="fas fa-plus" style="font-size: 62pt;"></i></h1>

                                        <span class="tooltiptext">Adicionar sala</span>
                                    </div>
                                </center>
                            </a>


                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
</body>