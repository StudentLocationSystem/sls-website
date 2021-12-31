<?php
require_once '../../repository/connection.php';
include '../menu/menu.php';


?>

<head>
    <link rel="stylesheet" href="../components/style_menu.css">
    <link rel="stylesheet" href="../components/style_form.css">
</head>

<style type="text/css">
    .activity-card h3{
        padding-top: 5px;
    }
    .button-action{
        color: #fff;
        font-size: 14px;
        padding: 6px 20px;
        border-radius: 5px;
        margin-right: 10px;
    }
    .return{
        background-color: #451d5c;
    }
    .edit{
        background-color: #2a6e78;
    }
    .delete{
        background-color: #f60c49;
    }
</style>


<div class="main-content">

    <header>
        <div class="search-wrapper title">
            <a class="button-action return" href="../class/class.php">Voltar</a>
        </div>

        <div class="social-icons">
            <span class="ti-bell"></span>
            <span class="ti-comment"></span>
            <div></div>
        </div>
    </header>

    <main>

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
                                              <a class="button-action edit" href="../forms/student_update_form.php?id_student=<?php echo $row['id']?>&id_classRoom=<?php echo $row['class']?>">Editar</a>
                                              <a class="button-action delete"  href="../../models/student_models.php?id_student=<?php echo $row['id']?>&id_classRoom=<?php echo $classStudentFK?>">Deletar</a>
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

    </main>

</div>

</body>

</html>