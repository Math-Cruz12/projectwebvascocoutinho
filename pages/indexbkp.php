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

    header("Location: login.php");
    exit();

}

/* BUSCA PRODUTOS */

$sql = "SELECT * FROM produtosimg ORDER BY id DESC";

$result = $conn->query($sql);

/* CARRINHO */

if(!isset($_SESSION['carrinho'])){

    $_SESSION['carrinho'] = [];

}

$total = 0;

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">

<title>

Cantina Vasco Coutinho

</title>

<style>

*{

    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;

}

body{

    background-image:url('../assets/img/planos-fundobanner.png');
    padding:20px;

}

/* HEADER */

header{

    background-image:url('../assets/img/telaLogin 23 de mai. de 2026, 18_23_05.png');

    height:227px;

    border-radius:20px;

    padding:20px;

    margin-bottom:30px;

}

header h1{

    text-align:center;
    color:orange;
    font-size:28px;

}

/* MENU */

.menu{

    display:flex;
    gap:15px;

}

.menu img{

    width:40px;
    height:40px;

}

/* CLIENTE */

.usuario{

    text-align:center;
    margin-bottom:30px;

}

.usuario label{

    background:#0e3c40;
    color:orange;
    padding:10px 20px;
    border-radius:10px;

}

/* PRODUTOS */

.produtos{

    display:flex;
    flex-wrap:wrap;
    gap:20px;
    justify-content:center;

}

.card{

    background:white;

    width:300px;

    border-radius:20px;

    padding:20px;

    box-shadow:0px 0px 10px rgba(0,0,0,0.2);

    text-align:center;

}

.card img{

    width:100%;
    height:220px;
    object-fit:cover;
    border-radius:15px;

}

.card h2{

    margin-top:15px;
    color:#0e3c40;

}

.card p{

    margin-top:10px;

}

.preco{

    color:green;
    font-size:24px;
    font-weight:bold;

}

/* BOTÃO */

button{

    width:100%;

    padding:12px;

    margin-top:15px;

    border:none;

    border-radius:10px;

    background:#3196ee;

    color:white;

    cursor:pointer;

    font-size:18px;

}

button:hover{

    background:#0e3c40;

}

/* CARRINHO */

.carrinho-container{

    position:fixed;

    top:20px;

    right:20px;

    width:320px;

}

.carrinho-icone{

    background:#0e3c40;

    color:white;

    padding:15px;

    border-radius:15px;

    font-size:22px;

    position:relative;

    text-align:center;

}

.contador{

    position:absolute;

    top:-10px;

    right:-10px;

    background:red;

    width:25px;

    height:25px;

    border-radius:50%;

    display:flex;

    justify-content:center;

    align-items:center;

}

.item{

    background:white;

    padding:15px;

    margin-top:15px;

    border-radius:15px;

    box-shadow:0px 0px 10px rgba(0,0,0,0.1);

}

.nome-produto{

    font-weight:bold;
    color:#0e3c40;

}

.preco-item{

    color:green;
    font-weight:bold;

}

.total{

    margin-top:20px;

    font-size:22px;

    color:green;

    font-weight:bold;

}

/* Botão Menu */

.menu-btn{
    position:fixed;
    top:20px;
    left:10px;
    font-size:30px;
    background:none;
    border:none;
    color:black;
    cursor:pointer;
    width: 121px;
}

/* Menu Lateral */

.sidebar{
    position:fixed;
    top:0;
    left:-280px;
    width:280px;
    height:100%;
    background:black;
    transition:0.4s;
    padding:30px;
    z-index:1000;
}

.fechar{
    color:white;
    font-size:30px;
    cursor:pointer;
    margin-bottom:30px;
    margin-left:12px;
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


</style>

</head>

<body>

<header>



<button id="abrirMenu" class="menu-btn">
☰
</button> <br> <br>

<!-- Menu Lateral -->
<div id="menuLateral" class="sidebar">

    <span class="fechar" onclick="fecharMenu()">fechar</span>

  

    <nav>
       
        <a href="../actions/visualizar_carrinho.php">Ver carrinho</a>
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

<div class="usuario">

<label>

Bem-vindo,
<?php echo $_SESSION['usuario']; ?>

</label>

</div>

<div class="produtos">

<?php while($produtoimg = $result->fetch_assoc()) { ?>

<div class="card">

<?php

$imagem = !empty($produtoimg['imagem'])
? $produtoimg['imagem']
: 'sem-imagem.png';

?>

<img src="./img/<?php echo $imagem; ?>">
<h2>

<?php echo $produtoimg['nome']; ?>

</h2>

<p>

<?php echo $produtoimg['descricao']; ?>

</p>

<p class="preco">

R$

<?php

echo number_format(
$produtoimg['preco'],
2,
',',
'.'
);

?>

</p>

<form action="../actions/carrinho.php" method="POST">

<input type="hidden"
name="id"
value="<?php echo $produtoimg['id']; ?>">

<input type="hidden"
name="nome"
value="<?php echo $produtoimg['nome']; ?>">

<input type="hidden"
name="preco"
value="<?php echo $produtoimg['preco']; ?>">

<input type="hidden"
name="imagem"
value="<?php echo $produtoimg['imagem']; ?>">



<button type="submit">

Adicionar ao Carrinho

</button>

</form>

</div>

<?php } ?>

</div>

<!-- CARRINHO -->

<div class="carrinho-container">

 

<div class="contador">

<?php echo count($_SESSION['carrinho']); ?>

</div>

</div>

<?php

if(count($_SESSION['carrinho']) > 0){

foreach($_SESSION['carrinho'] as $indice => $item){

$total += $item['preco'];

?>

<div class="item">

<div class="nome-produto">

<?php echo $item['nome']; ?>

</div>

<div class="preco-item">

R$
<?php

echo number_format(
$item['preco'],
2,
',',
'.'
);

?>

</div>

<form action="../actions/remover.php" method="POST">

<input type="hidden"
name="indice"
value="<?php echo $indice; ?>">

<button type="submit">

Remover

</button>

</form>

</div>

<?php

}

}

?>

<div class="total">

Total:
R$
<?php echo number_format($total,2,',','.'); ?>

</div>

<form action="../actions/visualizar_carrinho.php" method="POST">

<input type="hidden"
name="cliente"
value="<?php echo $_SESSION['usuario']; ?>">

<button type="submit">

Finalizar Pedido

</button>

</form>

</div>

</body>
</html>