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


/* VERIFICA LOGIN */
if(!isset($_SESSION['usuario'])){
    header("Location: login.php");
    exit();
}

/* CARRINHO */
if(!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0){
    header("Location: finalizar.php");
    exit();
}

$total = 0;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pagamento - Cantina Vasco Coutinho</title>
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










.pagamento{
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

.removebtn{
     width:20%;
    padding:12px;
    margin-top:15px;
    border:none;
    border-radius:10px;
    background:#3196ee;
    color:white;
    cursor:pointer;
    font-size:18px;
    margin-left:647px;
    


}

.removebtn{
     background:#0e3c40;
}
</style>
</head>
<body>
    <header>

    
    </header>

    



<div class="pagamento">
    <h1>Finalizar Pagamento  </h1>

<?php
foreach($_SESSION['carrinho'] as $indice => $item){
    $total += $item['preco'];
?>
   
<div class="item">

    <div class="nome-produto">
        <?php echo $item['nome']; ?>
    </div>

    <div class="preco-item">
        R$ <?php echo number_format($item['preco'],2,',','.'); ?>
    </div>

    <form action="../actions/remover.php" method="POST">

        <input
        type="hidden"
        name="indice"
        value="<?php echo $indice; ?>">

        <button class="removebtn" type="submit">
            Remover
        </button>

    </form>
</div>

<?php } ?>


<div class="total">
Total: R$ <?php echo number_format($total,2,',','.'); ?>
</div>

<form action="processar_pagamento.php" method="POST">
    <h3>Escolha a forma de pagamento:</h3>
    <label><input type="radio" name="forma" value="pix" required> PIX</label><br>
    <label><input type="radio" name="forma" value="cartao"> Cartão de Crédito</label><br>
    <label><input type="radio" name="forma" value="boleto"> Boleto Bancário</label><br>

    <button type="submit">Confirmar Pagamento</button>
 

</div>

</body>
</html>
