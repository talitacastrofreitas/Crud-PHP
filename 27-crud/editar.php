<?php

//Conexao
include_once 'php_action/db_connect.php';
//HEADER
include_once 'includes/header.php';
if (isset ($_GET['id'])):
    $id = mysqli_escape_string($connect, $_GET['id']);
    $sql = "SELECT * FROM pacientes WHERE id = '$id'";
    $resultado = mysqli_query ($connect, $sql);
    $dados= mysqli_fetch_array($resultado);
endif;
?>

<div class="row">
    <div class="col s12 m6 push-m3">
        <h3 class= "light">Editar Paciente</h3>
        <form action= "php_action/update.php" method="POST">
            <input type="hidden" name= "id" value="<?php echo $dados['id'];?>">
            <div class="input-field col s12">
                <input type= "text" name= "nome" id="nome" value = "<?php echo $dados ['nome'];?>">
                <label for="nome">Nome</label>
            </div>

            <div class="input-field col s12">
                <input type= "text" name= "sobrenome" value = "<?php echo $dados ['sobrenome']?>" id="sobrenome">
                <label for="sobrenome">Sobrenome</label>
            </div>

            <div class="input-field col s12">
                <input type= "text" name= "email" value = "<?php echo $dados ['email'];?>" id="email" >
                <label for="email">E-mail</label>
            </div>

            <div class="input-field col s12">
                <input type= "text" name= "idade" value = "<?php echo $dados ['idade'];?>" id="idade" >
                <label for="idade">Idade</label>
            </div>
            <button type="submit" name= "btn-editar" class="btn">Atualizar</button>
            <a href="index.php" class="btn green">Lista de pacientes</a>


        </form>
    </div>
</div>






<?php
//FOOTER
include_once 'includes/footer.php';
?>
