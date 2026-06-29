
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

/* VERIFICA ADMIN */

if($_SESSION['tipo'] != "admin"){

    header("Location: ../index.php");
    exit();

}

/* BUSCA PEDIDOS */

$sql = "SELECT * FROM vendas ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">
<meta charset="UTF-8">
<link rel="stylesheet" href="../assets/style.css">
<head>
<title>
Pedidos
</title>
</head>




</head>

<body>
 


  <header>


    </header>






<h1>

Pedidos Feitos

</h1> 

<button id="abrirMenu" class="menu-btn">
☰
</button> <br> <br>

<!-- Menu Lateral -->
<div id="menuLateral" class="sidebar">

    <span class="fechar" onclick="fecharMenu()">fechar</span>

  

    <nav>
        <a href="../admin/index.php">DashBoad</a>
        <a href="../admin/produtos.php">Produtos</a>
        <a href="../admin/editar_produtos.php">Editar Produtos</a>
        <a href="../admin/login.php">Novo Usuário</a>
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

<th>Cliente</th>

<th>Total</th>

<th>Data</th>

<th>Itens</th>


<th>Ações</th>

</tr>

<?php while($pedido = $result->fetch_assoc()) { ?>

<tr>

<td>

<?php echo $pedido['id']; ?>

</td>

<td>

<?php echo $pedido['cliente']; ?>

</td>

<td>

R$
<?php

echo number_format(
$pedido['total'],
2,
',',
'.'
);

?>

</td>

<td>

<?php echo $pedido['data_venda']; ?>

</td>

<td>

<?php

$idVenda = $pedido['id'];

$sqlItens = "SELECT * FROM item_vendas
WHERE venda_id='$idVenda'";

$resultItens = $conn->query($sqlItens);

while($item = $resultItens->fetch_assoc()){

    echo "- ".$item['produto_nome'];

    echo "<br>";

}

?>

</td>

<td>

<a class="btn-cancelar"
href="cancelar_pedido.php?id=<?php echo $pedido['id']; ?>"
onclick="return confirm('Deseja cancelar este pedido?')">

Cancelar

</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>

