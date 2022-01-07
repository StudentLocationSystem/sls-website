<?php
include '../menu/menu.php';


?>

<head>
    <link rel="stylesheet" href="../components/style_form.css">
</head>

<div class="main-content">

    <header>
        <div class="search-wrapper title">
            <h2 style="font-size: 24px;">Tabela dos Alunos</h2>
        </div>
    </header>
    <main>
        <div class="activity-card">
            <div class="table-responsive">
                <h3>Lista de Alunos</h3>
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
                        $sql = $pdo->prepare("SELECT students.id, students.student, students.priority, classRoom.class FROM students JOIN classRoom ON classRoom.id = students.classStudentFK WHERE students.classStudentFK = :classStudentFK ORDER BY student ASC");
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
                                        <a class="button-action edit" href="../forms/student_update_form.php?id_student=<?php echo $row['id'] ?>&id_classRoom=<?php echo $row['class'] ?>">Editar</a>
                                        <a class="button-action delete" href="../../models/student_models.php?id_student=<?php echo $row['id'] ?>&id_classRoom=<?php echo $classStudentFK ?>&v=1">Deletar</a>
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