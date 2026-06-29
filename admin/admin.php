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

$conn = new mysqli("localhost", "root", "", "cantina");

if($conn->connect_error){

    die("Erro na conexão");

}

/* TOTAL VENDAS, AQUI PODEMOS VER TUDO QUE FOI VENDIDO */

$sqlTotal = "SELECT SUM(total) AS total_vendido FROM vendas";

$resultTotal = $conn->query($sqlTotal);

$total = $resultTotal->fetch_assoc();

/* QUANTIDADE PEDIDOS  */

$sqlPedidos = "SELECT COUNT(*) AS total_pedidos FROM vendas";

$resultPedidos = $conn->query($sqlPedidos);

$pedidos = $resultPedidos->fetch_assoc();

/* LISTA DE PEDIDOS */

$sqlLista = "SELECT * FROM vendas ORDER BY id DESC";

$lista = $conn->query($sqlLista);

if($_SESSION['tipo'] != "admin"){

    header("Location: ../index.php");

    exit();

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>Painel Admin</title>

<style>

*{

    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;

}

body{

    background:#f4f4f4;
    padding:20px;

}

/* TOPO */

header{

    background:#0e3c40;
    color:white;
    padding:20px;
    border-radius:15px;
    text-align:center;
    margin-bottom:30px;

}

header h1{

    font-size:42px;

}

/* CARDS */

.cards{

    display:flex;
    gap:20px;
    flex-wrap:wrap;
    margin-bottom:30px;

}

.card{

    flex:1;
    min-width:250px;
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0px 0px 10px rgba(0,0,0,0.1);

}

.card h2{

    color:#0e3c40;
    margin-bottom:15px;

}

.card p{

    font-size:32px;
    color:green;
    font-weight:bold;

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
    border-bottom:1px solid #ddd;
    text-align:center;

}

tr:hover{

    background:#f1f1f1;

}

a{

    text-decoration:none;
    background:#3196ee;
    color:white;
    padding:12px 18px;
    border-radius:10px;

}

.topo{

    margin-bottom:20px;

}
.topo :hover{
    background-color: orange;
    padding: 5px
    ;
}



.bottom{
    margin-left: 1300px;
}

.bottom :hover{
    background-color: orange;
    padding: 5px
    ;
}


 header {
      background-image: url(https://vascocoutinho.ceet.secti.es.gov.br/Media/CeetVascoCoutinho/SelecaoAluno2024/IMG-20240618-WA0028.jpg);
      height: 150px;
      padding: 20px;
    }
    header h1 {
      color: orange;
      text-align: center;
      font-family: 'Courier New', Courier, monospace;
      font-size: 52px;
    }
</style>

</head>

<body>

<div class="topo">

<a href="../index.php">

Voltar para Cantina

</a>


</div>


<header>

<h1>

Painel Administrativo DashBoard 

</h1>
<div class="bottom">

<a href="produtos.php">

Conferir Produtos 

</a>
</div>

</header>


<div class="cards">

<div class="card">

<h2>

Total Vendido

</h2>

<p>
    

R$
<?php

echo number_format(
$total['total_vendido'] ?? 0,2,',','.');
?>

</p>

</div>

<div class="card">

<h2>

Pedidos Realizados

</h2>

<p>
    

<?php

echo $pedidos['total_pedidos'];

?>

</p>

</div>

</div>

<table>

<tr>

<th>ID</th>

<th>Cliente</th>

<th>Total</th>

<th>Data</th>

</tr>

<?php while($venda = $lista->fetch_assoc()) { ?>

<tr>

<td>

<?php echo $venda['id']; ?>

</td>

<td>

<?php echo $venda['cliente']; ?>

</td>

<td>

R$
<?php

echo number_format(
$venda['total'],
2,
',',
'.'
);

?>

</td>

<td>

<td>

<?php echo $venda['data_venda']; ?>

</td>

<td>

<a href="editar_venda.php?id=<?php echo $venda['id']; ?>">
Editar
</a>

<a href="excluir_venda.php?id=<?php echo $venda['id']; ?>"
onclick="return confirm('Deseja excluir essa venda?')">

Excluir

</a>

</td>



</td>

</tr>

<?php } ?>



</table>



</body>

</html>