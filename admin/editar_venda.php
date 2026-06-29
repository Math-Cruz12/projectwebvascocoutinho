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

$id = $_GET['id'];

$sql = "SELECT * FROM vendas WHERE id = $id";

$result = $conn->query($sql);

$venda = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
<title>Editar Venda</title>
</head>
<style>

    .acoes{

    display:flex;
    gap:10px;
    justify-content:center;

}

.editar{

    background:orange;

}

.excluir{

    background:red;

}
</style>

<body>

<h2>Editar Venda</h2>

<form action="atualizar_venda.php" method="POST">

<input type="hidden"
name="id"
value="<?php echo $venda['id']; ?>">

<label>Cliente:</label>

<input type="text"
name="cliente"
value="<?php echo $venda['cliente']; ?>">

<br><br>

<label>Total:</label>

<input type="text"
name="total"
value="<?php echo $venda['total']; ?>">

<br><br>

<button type="submit">

Atualizar Venda

</button>

</form>

</body>
</html>