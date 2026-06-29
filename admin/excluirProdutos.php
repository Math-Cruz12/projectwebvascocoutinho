<?php

$conn = new mysqli("localhost", "root", "", "cantina");

if ($conn->connect_error) {
    die("Erro de conexão");
}

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM produtos WHERE id = $id";

    if($conn->query($sql) === TRUE){
        echo "Produtos excluído!";
    } else {
        echo "Erro ao excluir";
    }
}

header("Location: produtos.php");
exit();

?>