<?php

session_start();
include("../config/conexao.php");
if(!isset($_SESSION['carrinho'])){
    $_SESSION['carrinho'] = [];
}

$item =  [

    "id" => $_POST['id'],
    "nome" => $_POST['nome'],
    "preco" => $_POST['preco']


];

$_SESSION['carrinho'][] = $item;

header("Location: ../pages/index.php");

?>