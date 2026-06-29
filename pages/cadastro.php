<?php
$conn = new mysqli("localhost", "root","","cantina");
if($conn->connect_error){
    echo "Erro na conexão";
}  


if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $tipo = $_POST['tipo'];


    $sql = " INSERT INTO usuarios (nome,email,senha,tipo)
    VALUES  ('$nome','$email','$senha','$tipo')";
    if($conn->query($sql) == true){
        echo "Cadastro realizado com sucesso !";
         header("Location: ../index.php");
    }else{

    echo "Erro ao cadastro tente novamente mais tarde";
    }
}




?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />

    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />

    <link rel="stylesheet" href="../assets/css/default.css" />

    <link rel="stylesheet" href="../assets/css/header.css" />

    <link rel="stylesheet" href="../assets/css/home.css" />

    <link rel="stylesheet" href="../assets/css/cardapio.css" />

    <link rel="stylesheet" href="../assets/css/carrinho.css" />

    <link rel="stylesheet" href="../assets/css/sobre.css" />

    <link rel="stylesheet" href="../assets/css/footer.css" />

<title>Cadastro</title>

<style>
*{

    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;

}

body{

    background-image:url('../assets/img/telaLogin 23 de mai. de 2026, 18_23_05.png'); 
    no-repeat; 
    padding:20px;
    background-size: cover;
background-repeat: no-repeat;
background-position: center;
    

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















input, select{

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

.msg{

    text-align:center;
    color:green;
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

<header>

</header>


<div class="box">




<h1>

Cadastro de Usuário

</h1>

<?php

if(isset($mensagem)){

    echo "<div class='msg'>$mensagem</div>";

}

?>

<form  method="POST">

<input type="text"
name="nome"
placeholder="Digite seu nome"
required>

<input type="email"
name="email"
placeholder="Digite seu email"
required>

<input type="password"
name="senha"
placeholder="Digite sua senha"
required>

<select name="tipo" required>

<option value="">

Selecione seu tipo

</option>

<option value="aluno">

Aluno

</option>

<option value="professor">

Professor

</option>

<option value="funcionario">

Funcionário

</option>

</select>

<button type="submit">

Cadastrar

</button>

</form>

<a class="ab" href="../index.php">

Já possui conta? Fazer login

</a>

</div>


 <script src="js/btn-mobile.js"></script>

    <script src="js/form.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
      function mascararTel(v) {
        v = v.replace(/\D/g, "");
        v = v.replace(/^(\d{2})(\d)/g, "($1) $2");
        v = v.replace(/(\d)(\d{4})$/, "$1-$2");
        let inputTel = document.querySelector("#inputTel");
        inputTel.value = v;
      }
    </script>

</body>

</html>