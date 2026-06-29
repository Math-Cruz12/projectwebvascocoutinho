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

/* VERIFICA LOGIN */

if(!isset($_SESSION['usuario'])){

    header("Location: ../login.php");
    exit();

}

/* VERIFICA SE É ADMIN */

if($_SESSION['tipo'] != "admin"){

    header("Location: ../index.php");
    exit();

}

/* TOTAL PRODUTOS */

$sqlProdutosimg = "SELECT COUNT(*) AS total_produtos FROM produtosimg";

$resultProdutosimg = $conn->query($sqlProdutosimg);

$produtosimg = $resultProdutosimg->fetch_assoc();

/* TOTAL VENDAS */

$sqlVendas = "SELECT SUM(total) AS total_vendido FROM vendas";

$resultVendas = $conn->query($sqlVendas);

$vendas = $resultVendas->fetch_assoc();

/* TOTAL PEDIDOS */

$sqlPedidos = "SELECT COUNT(*) AS total_pedidos FROM vendas";

$resultPedidos = $conn->query($sqlPedidos);

$pedidos = $resultPedidos->fetch_assoc();

/* LISTA PRODUTOS */

$sqlLista = "SELECT * FROM produtosimg ORDER BY id DESC";

$lista = $conn->query($sqlLista);

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport"
content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/style.css">
<title>
Painel Administrativo  
</title>
</head>
<body>
<header>
<h1>

Painel Administrativo 

</h1> <br> <br>
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
        <a href="../actions/logout.php">Sair</a>
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



</header>

<!-- CARDS -->

<div class="painel">

<div class="card">

<h2>

Produtos Cadastrados

</h2>

<p>

<?php echo $produtosimg['total_produtos']; ?>

</p>

</div>

<div class="card">

<h2>

Pedidos Realizados

</h2>

<p>

<?php echo $pedidos['total_pedidos']; ?>

</p>

</div>

<div class="card">

<h2>

Total Vendido

</h2>

<p>

R$
<?php

echo number_format(
$vendas['total_vendido'] ?? 0,
2,
',',
'.'
);

?>

</p>

</div>

</div>

<!-- MENU ADMIN -->

<div class="acoes">

<a href="cadastrar_produto.php">

Cadastrar Novo Produto

</a>

<a href="pedidos.php">

Ver Pedidos

</a>

<a href="usuarios.php">

Usuários

</a>

<a href="../admin/dashboad.php">

Dashboard

</a>

<a href="produtos.php">
Ver produtos 
</a>

</div>

<!-- TABELA PRODUTOS -->

<table>

<tr>

<th>ID</th>

<th>Imagem</th>

<th>Nome</th>

<th>Descrição</th>

<th>Preço</th>


<th>Ações</th>

</tr>

<?php while($produto = $lista->fetch_assoc()) { ?>

<tr>

<td>

<?php echo $produto['id']; ?>

</td>

<td>

<?php

$imagem = !empty($produto['imagem'])

? $produto['imagem']

: 'sem-imagem.png';

?>

<img
class="produto-img"
src="../assets/img/<?php echo $imagem; ?>">

</td>

<td>

<?php echo $produto['nome']; ?>

</td>

<td>

<?php echo $produto['descricao']; ?>

</td>


<td>

R$
<?php

echo number_format(
$produto['preco'],
2,
',',
'.'
);

?>

</td>

<td>

<a
class="btn-editar"
href="editar_produto.php?id=<?php echo $produto['id']; ?>">

Editar

</a>

<a
class="btn-excluir"
href="excluir_produto.php?id=<?php echo $produto['id']; ?>"
onclick="return confirm('Deseja excluir este produto?')">

Excluir

</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>