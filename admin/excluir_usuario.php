<?php

$conn = new mysqli("localhost", "root", "", "cantina");

if($conn->connect_error){

    die("Erro na conexão");

}

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM usuarios WHERE id = $id";

    if($conn->query($sql) === TRUE){

        echo "usuario excluída com sucesso!";

    } else {

        echo "Erro ao excluir ";

    }

}

header("Location: usuarios.php");

exit();

?>