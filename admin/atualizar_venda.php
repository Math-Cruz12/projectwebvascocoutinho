<?php

$conn = new mysqli("localhost", "root", "", "cantina");

if($conn->connect_error){

    die("Erro na conexão");

}

$id = $_POST['id'];

$cliente = $_POST['cliente'];

$total = $_POST['total'];

$sql = "UPDATE vendas SET

cliente = '$cliente',
total = '$total'

WHERE id = $id";

if($conn->query($sql) === TRUE){

    echo "Venda atualizada!";

} else {

    echo "Erro ao atualizar";

}

header("Location: admin.php");

exit();

?>