<?php

$conn = new mysqli("localhost", "root", "", "cantina");

if($conn->connect_error){

    die("Erro na conexão");

}

if(isset($_GET['id'])){

    $id = $_GET['id'];

    $sql = "DELETE FROM vendas WHERE id = $id";

    if($conn->query($sql) === TRUE){

        echo "Venda excluída com sucesso!";

    } else {

        echo "Erro ao excluir venda";

    }

}

header("Location: admin.php");

exit();

?>