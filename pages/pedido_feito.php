
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
unset($_SESSION['carrinho']);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./admin/style.css">
    <title>Pedido Concluído</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            
    background-image:url('./img/planos-fundobanner.png');
    padding:20px;
        
            text-align: center;
            padding: 50px;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            display: inline-block;
            margin-top: 200px;
        }
        h1 {
            color: #2c7be5;
        }
        p {
            font-size: 18px;
            color: #333;
        }
        img {
            width: 200px;
            margin: 20px 0;
        }
        a.button {
            display: inline-block;
            padding: 15px 30px;
            background: orange;
            color: white;
            text-decoration: none;
            border-radius: 10px;
            font-size: 18px;
            margin-top: 20px;
        }
        a.button:hover {
            background: darkorange;
        }


    </style>
</head>
<body>
    <div class="container">
        <h1>Seu pedido foi feito com sucesso!</h1>
        <p>Por favor, vá à cantina recebê-lo.</p>
        <img src="./img/pedidoFeito.png" alt="Carrinho feliz">
        <br>
        <a href="index.php" class="button">Voltar para a Cantina</a>
    </div>
</body>
</html>
<?php
