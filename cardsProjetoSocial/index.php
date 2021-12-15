<?php require_once 'connection.php'; ?>
<head>
    <title>Cards Demo - Student Location System</title>

<link rel="stylesheet" type="text/css" href="styles/index.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" integrity="sha384-DyZ88mC6Up2uqS4h/KRgHuoeGwBcD4Ng9SiP4dIRy0EXTlnuz47vAwmeGwVChigm" crossorigin="anonymous">
</head>

<body>
<div class="container">
    <div class="row">
<!--         <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card" style="background: blue;">
                <div class="card-block">
                    <h2 class="m-b-20">nome da sala</h2>
                    <h2 class="text-right f-right">
                        <a class="button-card">
                            <div class="tooltip"><i class="fas fa-pen"></i>
                                <span class="tooltiptext">Editar</span>
                            </div>
                        </a>
                        <a class="button-card">
                            <div class="tooltip"><i class="fas fa-trash"></i>
                                <span class="tooltiptext">Excluir</span>
                            </div>
                        </a>
                        
                    </h2>
                    <p class="m-b-0">486 alunos<span class="f-right"></span></p>
                </div>
            </div>
        </div> -->

<?php
 $sql = "SELECT * FROM dadoscards";
            $result = $connect->query($sql);

            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "
                        <div class='sala'>
            <div class='card bg-c-blue order-card' style='background-image: linear-gradient(".$row['corHex'].", rgb(60,60,60));'>
                <div class='card-block'>
                    <h1 class='m-b-20 title' title='".$row['nomeSala']."'>".$row['nomeSala']."</h1>
                    <h2 class='text-right f-right'>
                        <a class='button-card'>
                            <div class='tooltip'><i class='fas fa-pen'></i>
                                <span class='tooltiptext'>Editar</span>
                            </div>
                        </a>
                        <a class='button-card'>
                            <div class='tooltip'><i class='fas fa-trash'></i>
                                <span class='tooltiptext'>Excluir</span>
                            </div>
                        </a>
                        
                    </h2>
                    <p class='m-b-0' title='".$row['quantAlunos']." alunos'>".$row['quantAlunos']." alunos<span class='f-right'></span></p>
                </div>
            </div>
        </div>";
                }
            } else {
                echo "<tr><td colspan='5'><center>Nenhuma sala cadastrada.</center></td></tr>";
            }
            ?>

        <div class="col-md-4 col-xl-3">
            <div class="card bg-c-blue order-card" style="background: rgb(200,200,200);">
                <div class="card-block" >
                    <a class="button-card">
                            <center>
                            <div class="tooltip"> <h1 class="m-b-20"><i class="fas fa-plus" style="font-size: 62pt;"></i></h1>

                                <span class="tooltiptext">Adicionar sala</span>
                            </div>
                            </center>
                        </a>
                   

                </div>
            </div>
        </div>

	</div>
</div>
</body> 
