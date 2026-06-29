<?php

$conn = new mysqli(
"localhost",
"root",
"",
"cantina"
);

if($conn->connect_error){

    die("Erro na conexão");

}

?>