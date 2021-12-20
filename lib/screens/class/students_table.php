<?php
require_once '../../repository/connection.php';
include '../menu/menu.php';


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
                    <h3>Lista de alunos</h3>
                    <div class="table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>Prioridade</th>
                                    <th>Sala</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $classStudentFK = $_GET['id_classRoom'];
                                global $pdo;
                                $sql = $pdo->prepare("SELECT students.id, students.student, students.priority, classroom.class FROM students JOIN classroom ON classroom.id = students.classStudentFK WHERE students.classStudentFK = :classStudentFK");
                                $sql->bindValue('classStudentFK', $classStudentFK);

                                $sql->execute();

                                if ($sql->rowCount() > 0) {
                                    while ($row = $sql->fetch(PDO::FETCH_ASSOC)) { ?>
                                        <tr>
                                            <td> <?php echo $row['id']; ?></td>
                                            <td><?php echo $row['student']; ?></td>
                                            <td><?php echo $row['priority']; ?></td>
                                            <td><?php echo $row['class']; ?></td>
                                            <td>
                                              <a href="../../models/student_models.php?id_student=<?php echo $row['id']?>&id_classRoom=<?php echo $classStudentFK?>">Deletar</a>
                                              <a href="../forms/student_update_form.php?id_student=<?php echo $row['id']?>&id_classRoom=<?php echo $row['class']?>">Editar</a>
                                            </td>

                                        </tr>
                                <?php }
                                } else {
                                    echo "<tr><td colspan='5'><center>Nenhuma aluno cadastrado.</center></td></tr>";
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