<?php
require_once '../../repository/connection.php';
include '../menu/menu.php';
require '../../repository/map_repository.php';
$u = new Map();

$sql = $u-> toString($_SESSION['id_userLogged']);

?>

<head>
    <link rel="stylesheet" href="../components/style_menu.css">
    <link rel="stylesheet" href="../components/style_form.css">
</head>
<div class="main-content">

    <header>
        <div class="search-wrapper">
            <span class="ti-search"></span>
            <input type="search" placeholder="Search">
        </div>

        <div class="social-icons">
            <span class="ti-bell"></span>
            <span class="ti-comment"></span>
            <div></div>
        </div>
    </header>

    <main>


        <section class="recent">
            <div class="activity-grid">
                <div class="activity-card">
                    <h3>Lista de Mapeamentos</h3>
                    <div class="table-responsive">
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
                                              <a href="../../models/map_models.php?idMap=<?php echo $row['idMap'];?>">Deletar</a>
                                              <a href="map_screen_update.php?classStudentFK=<?php echo $row['classMapFK']?>&map=<?php echo $row['map']?>">Editar</a>
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


            </div>
        </section>

    </main>

</div>

</body>

</html>