    <?php 
    require '../conexao/conexao.php';  
    require 'header.php';
    require 'components/functions_bd.php';
    ?>
    <form class="formlogin" action="create/create_aluno.php" method="POST">
        <div class="card">
            <div class="cardtop">
            <H2 class="text">Cadastrar Aluno</H2>
            </div>
            <div class="cardcenter">
                <label>Aluno</label>
                <input type="text" name="aluno" placeholder="Aluno" maxlength="30" required>
                <br>
                <label>Sala</label>
                <select class="form-select" name="sala" required>
                <option value="3°B">3°B</option>
                <option value="2°B">2°B</option>   
                </select>
                <br>
                <label>Tem problema de visão?</label>
                <select class="form-select" name="visao" required>
                <option value="1">Sim</option>
                <option value="2">Não</option>   
                </select>     
                <br>
                <label>Ele é alto?</label>
                <select class="form-select" name="altura" required>
                <option value="1">Sim</option>
                <option value="2">Não</option>   
                </select>
                <br>
            </div>
            <button class="button btn btn-danger" type="submit">Cadastrar</button>
            
    </form>
</body>
</html>