<?php
//CLEAR
function clear($input) {
    global $connect;
    //SQL
    $var = mysqli_escape_string($connect, $input);
    //XSS
    $var = htmlspecialchars($var);
    return $var;
}
//Sessão
session_start();
//Conexão
require_once 'db_connect.php';

if (isset($_POST['btn-cadastrar'])):
    $nome=mysqli_escape_string($connect, $_POST['nome']);
    $sobrenome=mysqli_escape_string($connect, $_POST['sobrenome']);
    $email=mysqli_escape_string($connect, $_POST['email']);
    $idade=mysqli_escape_string($connect, $_POST['idade']);

    $sql= "INSERT INTO pacientes (nome, sobrenome, email, idade) VALUES ('$nome', '$sobrenome', '$email', '$idade')";

    if(mysqli_query($connect, $sql)):
        $_SESSION['mensagem']="Cadastrado com sucesso!";
        header('Location: ../index.php');
    else:
        $_SESSION['mensagem']= "Erro ao cadastrar.";
        header('Location: ../index.php');
    endif;

endif;
