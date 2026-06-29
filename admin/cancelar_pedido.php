<?php

session_start();

include("../config/conexao.php");

if($_SESSION['tipo'] != "admin"){

    header("Location: ../index.php");
    exit();

}

$id = $_GET['id'];

/* EXCLUI ITENS DO PEDIDO */

$sqlItens = "DELETE FROM item_vendas
WHERE venda_id='$id'";

$conn->query($sqlItens);

/* EXCLUI O PEDIDO */

$sqlPedido = "DELETE FROM vendas
WHERE id='$id'";

if($conn->query($sqlPedido) === TRUE){

    header("Location: pedidos.php");

} else {

    echo "Erro ao cancelar pedido";

}

?>