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

include("../config/conexao.php");

if($_SESSION['tipo'] != "admin"){

    header("Location: ../index.php");
    exit();

}

$sql = "SELECT * FROM produtosimg ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">


<title>
Produtos
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



table{

    width:100%;
    background:white;
    border-collapse:collapse;

}

th, td{

    padding:15px;
    border:1px solid #ddd;
    text-align:center;

}

th{

    background:#3196ee;
    color:white;

}

img{

    width:80px;
    height:80px;
    object-fit:cover;
    border-radius:10px;
}

a{

    text-decoration:none;
    padding:10px 15px;
    border-radius:10px;
    color:white;

}

.editar{

    background:orange;

}

.excluir{

    background:red;

}

.cadastrar{

    background:green;
    display:inline-block;
    margin-bottom:4px;
    margin-left:91%;
    

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
    url('..img/bravo.png');

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

*{

    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;

}



</style>

</head>

<body>




<header>

<div class="menu">

<a href="logout.php">



</a>


</div>


</header>





<a class="cadastrar"
href="cadastrar_produto.php">

Novo Produto 

</a>


<button id="abrirMenu" class="menu-btn">
☰
</button> <br> <br>

<!-- Menu Lateral -->
<div id="menuLateral" class="sidebar">

    <span class="fechar" onclick="fecharMenu()">fechar</span>

  

    <nav>
        <a href="../admin/index.php">DashBoad</a>
        <a href="../admin/produtos.php">Produtos</a>
        <a href="../cadastro.php">Novo Usuário</a>
        <a href="#">Suporte</a>
    </nav>

</div>

<script>
function fecharMenu(){
    document.getElementById("menuLateral").style.left = "-280px";
}

document.getElementById("abrirMenu").onclick = function(){
    document.getElementById("menuLateral").style.left = "0";
}
</script>





<table>

<tr>

<th>ID</th>

<th>Imagem</th>

<th>Nome</th>

<th>Descrição</th>

<th>Preço</th>
<th>Dia da Semana</th>

<th>Ações</th>

</tr>

<?php while($produtoimg = $result->fetch_assoc()) { ?>

<tr>

<td>

<?php echo $produtoimg['id']; ?>

</td>

<td>

<img src="../assets/img/<?php echo $produtoimg['imagem']; ?>">

</td>

<td>

<?php echo $produtoimg['nome']; ?>

</td>

<td>

<?php echo $produtoimg['descricao']; ?>

</td>

<td>

R$
<?php echo number_format($produtoimg['preco'],2,',','.'); ?>

</td>

<td>

<?php echo $produtoimg['diaSemana']; ?>

</td>

<td>

<a class="editar"
href="editar_produto.php?id=<?php echo $produtoimg['id']; ?>">

Editar

</a>

<a class="excluir"
href="excluir_produto.php?id=<?php echo $produtoimg['id']; ?>">

Excluir

</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>