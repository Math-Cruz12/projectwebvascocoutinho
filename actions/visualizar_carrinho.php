<?php
session_start();

include("./config/conexao.php");

/* VERIFICA LOGIN */
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Carrinho - Cantina Vasco Coutinho</title>
<style>
body{
    background-image:url('./img/planos-fundobanner.png');
    padding:20px;
    font-family:Arial, Helvetica, sans-serif;
}
h1{
    text-align:center;
    color:orange;
    margin-bottom:30px;
}
.carrinho{
    max-width:800px;
    margin:0 auto;
    background:white;
    border-radius:20px;
    padding:20px;
    box-shadow:0px 0px 10px rgba(0,0,0,0.2);
}
.item{
    background:#f9f9f9;
    padding:15px;
    margin-bottom:15px;
    border-radius:15px;
    box-shadow:0px 0px 5px rgba(0,0,0,0.1);
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
    text-align:right;
}
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
/* HEADER */

header{

    background-image:url('./img/telaLogin 23 de mai. de 2026, 18_23_05.png');

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
</style>
</head>
<body>
    <header>


    </header>



<div class="carrinho">
    <h1>Seu Carrinho</h1>

<?php
if(count($_SESSION['carrinho']) > 0){
    foreach($_SESSION['carrinho'] as $indice => $item){
        $total += $item['preco'];
?>
    <div class="item">
        <div class="nome-produto"><?php echo $item['nome']; ?></div>
        <div class="preco-item">R$ <?php echo number_format($item['preco'],2,',','.'); ?></div>
        <form action="remove_carrinho.php" method="POST">
            <input type="hidden" name="indice" value="<?php echo $indice; ?>">
            <button type="submit">Remover</button>
        </form>
    </div>
<?php
    }
}else{
    echo "<p>Seu carrinho está vazio.</p>";
}
?>

<div class="total">
Total: R$ <?php echo number_format($total,2,',','.'); ?>
</div>

<?php if($total > 0){ ?>
<form action="pagamento.php" method="POST">
    <input type="hidden" name="cliente" value="<?php echo $_SESSION['usuario']; ?>">
    <button type="submit">Finalizar Compra</button>
</form>
<?php } ?>

</div>

</body>
</html>
