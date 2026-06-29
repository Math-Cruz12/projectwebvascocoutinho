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




?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>

Cadastrar Produtos

</title>

<style>

body{

   

}


/* HEADER */

header{

    background-image:url('https://vascocoutinho.ceet.secti.es.gov.br/Media/CeetVascoCoutinho/SelecaoAluno2024/IMG-20240618-WA0028.jpg');

    height:180px;

    border-radius:20px;

    padding:20px;

    margin-bottom:30px;

}

header h1{

    text-align:center;
    color:orange;
    font-size:28px;

}








form{

    background:white;
    width:500px;
    margin:auto;
    padding:30px;
    border-radius:20px;
    margin-top:221px;

}

input{

    width:100%;
    padding:12px;
    margin-top:15px;
    border-radius:10px;
    border:1px solid #ccc;

}

button{

    width:100%;
    padding:14px;
    margin-top:20px;
    border:none;
    background:#3196ee;
    color:white;
    border-radius:10px;
    font-size:18px;

}








.acoes a:hover{

    background:#0e3c40;

}

/* TABELA */

table{

    width:100%;

    background:white;

    border-collapse:collapse;

    border-radius:20px;

    overflow:hidden;

    box-shadow:0px 0px 10px rgba(0,0,0,0.1);

}

th{

    background:#3196ee;

    color:white;

    padding:15px;

}

td{

    padding:15px;

    text-align:center;

    border-bottom:1px solid #ddd;

}

tr:hover{

    background:#f1f1f1;

}

.produto-img{

    width:70px;
    height:70px;
    object-fit:cover;
    border-radius:10px;

}

.btn-editar{

    background:orange;
    color:white;
    padding:10px 15px;
    border-radius:10px;
    text-decoration:none;

}

.btn-excluir{

    background:red;
    color:white;
    padding:10px 15px;
    border-radius:10px;
    text-decoration:none;

}


body{
    overflow-x:hidden;
}

/* Botão Menu */

.menu-btn{
    position:fixed;
    top:20px;
    left:20px;
    z-index:1001;
    font-size:30px;
    background:none;
    border:none;
    color:black;
    cursor:pointer;
   
}

/* Menu Lateral */

.sidebar{
    position:fixed;
    top:0;
    left:-280px;
    width:280px;
    height:100%;
    background:#242424;
    transition:0.4s;
    padding:30px;
    z-index:1000;
}

.fechar{
    color:white;
    font-size:35px;
    cursor:pointer;
    display:block;
    margin-bottom:30px;
}

.btn-login{
    display:block;
    text-align:center;
    color:white;
    text-decoration:none;
    border:1px solid #777;
    padding:12px;
    margin-bottom:40px;
}

.sidebar nav a{
    display:block;
    color:white;
    text-decoration:none;
    padding:14px 0;
    font-size:22px;
}

.sidebar nav a:hover{
    color:#8e44ff;
}

/* Banner */

.banner{
    height:100vh;
    background:
    linear-gradient(
        rgba(98,0,255,.7),
        rgba(55,0,255,.7)
    ),
    url('banner.jpg');

    background-size:cover;
    background-position:center;

    color:white;

    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}

.banner h1{
    font-size:70px;
}

.banner p{
    margin-top:20px;
    font-size:22px;
}


















h1{
    text-align: center; 
}










</style>

</head>

<body>






<header>

<!-- CARDS -->

<div class="painel">

<div class="card">








</head>







<form
action="salvar_produto.php"
method="POST"
enctype="multipart/form-data">





<h2>

Cadastrar Produto

</h2>

<input
type="text"
name="nome"
placeholder="Nome do produto"
required>

<input
type="text"
name="descricao"
placeholder="Descrição"
required>

<input
type="text"
name="preco"
placeholder="Preço"
required>

<input
type="file"
name="imagem"
required>

<button type="submit">

Cadastrar Produto

</button>

</form>

</body>
</html>

<!------------------------------

CREATE TABLE produtos (

id INT AUTO_INCREMENT PRIMARY KEY,

nome VARCHAR(255),
descricao TEXT,
preco DECIMAL(10,2),

imagem VARCHAR(255),

ativo INT DEFAULT 1

);