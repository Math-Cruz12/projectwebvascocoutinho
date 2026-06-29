<?php

session_start();

if(isset($_POST['indice'])){

    $indice = $_POST['indice'];

    unset($_SESSION['carrinho'][$indice]);

    $_SESSION['carrinho'] = array_values($_SESSION['carrinho']);

}

header("Location: ../pages/pagamento.php");
exit();