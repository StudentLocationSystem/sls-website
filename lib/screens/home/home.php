<?php
include '../menu/menu.php';
require_once '../../repository/connection.php';
require '../../repository/map_repository.php';
require '../../repository/student_repository.php';
require '../../repository/classRoom_repository.php';
$u = new Map();
$g = new Student();
$c = new ClassRoom();
$sql = $g -> toStringAll($_SESSION['id_userLogged']);
$countStudents = $sql -> rowCount();
$sql = $c -> toStringAllClass($_SESSION['id_userLogged']);
$countClass = $sql -> rowCount();
$sql = $u-> toString($_SESSION['id_userLogged']);
$countMap = $sql -> rowCount();
?>


<head>
   
<link rel="stylesheet" href="../components/style_form.css">
</head>
<div class="main-content">

    <header>
        <div class="search-wrapper title">
            <h2 style="font-size: 24px;">Página inicial</h2>
        </div>
    </header>

    <main>

        <h2 class="dash-title">Painel</h2>

        <div class="dash-cards">
            <div class="card-single">
                <div class="card-body">
                    <i id="panel" class="fas fa-user-graduate"></i>
                    <div>
                        <h5>Alunos</h5>
                        <h4><?php echo $countStudents ?></h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="">Visualizar</a>
                </div>
            </div>

            <div class="card-single">
                <div class="card-body">
                    <i id="panel" class="fas fa-list"></i>
                    <div>
                        <h5>Salas</h5>
                        <h4><?php echo $countClass?></h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="">Visualizar</a>
                </div>
            </div>

            <div class="card-single">
                <div class="card-body">
                    <i id="panel" class="fas fa-map"></i>
                    <div>
                        <h5>Mapeamentos</h5>
                        <h4><?php echo $countMap?></h4>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="">Visualizar</a>
                </div>
            </div>
        </div>


        <section class="recent">
            <div class="activity-grid">
                
            <div class="activity-card">
                    <div class="table-responsive">
                    <h3>Lista de Mapeamentos</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Sala</th>
                               
                                    <th>Ações</th>
                             
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if ($sql->rowCount() > 0) {
                                    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td> <?php echo $row['idMap']; ?></td>
                                            <td><?php echo $row['class']; ?></td>
                           
                                          
                                            <td>
                                              <a class="button-action edit" href="map_screen_update.php?classStudentFK=<?php echo $row['classMapFK']?>&map=<?php echo $row['map']?>">Editar</a>
                                              <a class="button-action delete" href="../../models/map_models.php?idMap=<?php echo $row['idMap'];?>">Deletar</a>
                                            </td>

                                        </tr>
                                <?php }
                                } else {
                                    echo "<tr><td colspan='5'><center>Nenhuma mapa cadastrado.</center></td></tr>";
                                } ?>
                            </tbody>
                        </table>
                    </div>
                </div>

                
        </section>

    </main>

</div>

</body>

</html>