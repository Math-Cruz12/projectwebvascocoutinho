<?php
/*
|--------------------------------------------------------------------------
| Sistema ADM de Cantina 
|--------------------------------------------------------------------------
| Desenvolvido por: Matheus Cruz
| Linguagens: PHP, HTML, CSS, JavaScript e MySQL
| Instituição: [Centro Vasco Coutinho /Curso de Redes das Coisas]
| Ano: 2026
|
| Descrição:
| Sistema web para gerenciamento de cantina com cadastro de usuários,
| login, carrinho de compras, pagamentos e painel administrativo.
|
| © Matheus Cruz. Todos os direitos reservados.
|--------------------------------------------------------------------------
*/

session_start();

$conn = new mysqli(

"localhost",
"root",
"",
"cantina"
);

if($conn->connect_error){

    die("Erro na conexão");

}

if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $email = $_POST['email'];

    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios

    WHERE email='$email'

    AND senha='$senha'";

    $result = $conn->query($sql);

    if($result->num_rows > 0){

        $usuario = $result->fetch_assoc();

        /* SESSÕES */

        $_SESSION['usuario'] = $usuario['nome'];

        $_SESSION['tipo'] = $usuario['tipo'];

        $_SESSION['id_usuario'] = $usuario['id'];

        /* REDIRECIONAMENTO */

        if($_SESSION['tipo'] == "admin"){

            header("Location: admin/index.php");

        } else {

            header("Location: ./pages/index.php");

        }

        exit();

    } else {

        $erro = "Email ou senha inválidos";

    }

}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Login</title>

<style>

*{

    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;

}

body{

    background-image:url('./assets/img/telaLogin 23 de mai. de 2026, 18_23_05.png');
no-repeat; 
padding:20px;
background-size: cover;
background-repeat: no-repeat;

}

.box{

    width:500px;
    color: orange;
    margin:80px auto;
    padding:40px;
    border-radius:20px;
    box-shadow:0px 0px 10px rgba(0,0,0,0.2);
    margin-top: 260px;
     background-color: navy blue;


}

h1{

    text-align:center;
    color:black;
    margin-bottom:30px;
    font-family: 'Times New Roman', Times, serif;

}

input{

    width:100%;
    padding:12px;
    margin-bottom:20px;
    border-radius:10px;
    border:1px solid #ccc;
    font-size:18px;

}

button{

    width:100%;
    padding:12px;
    border:none;
    border-radius:10px;
    background:#3196ee;
    color:white;
    font-size:18px;
    cursor:pointer;

}

button:hover{

    background:#0e3c40;

}

.erro{

    color:red;
    text-align:center;
    margin-bottom:20px;
    font-weight:bold;

}

a{

    display:block;
    text-align:center;
    margin-top:20px;
    text-decoration:none;
    color:#3196ee;

}
.ab{
    color: black;
    font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    font-size: 18px;
}

</style>

</head>

<body>

<div class="box">

<h1>

Login do Sistema

</h1>

<?php

if(isset($erro)){

    echo "<div class='erro'>$erro</div>";

}

?>

<form method="POST">

<input type="email"
name="email"
placeholder="Digite seu email"
required>

<input type="password"
name="senha"
placeholder="Digite sua senha"
required>

<button type="submit">

Entrar

</button>

</form>

<a class="ab" href="./pages/cadastro.php">

Criar nova conta

</a>

</div>

</body>

</html>