<?php

session_start();

if(isset($_POST['indice'])){

    $indice = $_POST['indice'];

    unset($_SESSION['carrinho'][$indice]);

    

}

header("Location: visualizar_carrinho.php");

exit();

?>