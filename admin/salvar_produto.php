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

include("../config/conexao.php");

$nome = $_POST['nome'];

$descricao = $_POST['descricao'];

$preco = $_POST['preco'];

/* IMAGEM */

$imagem = $_FILES['imagem']['name'];

$temp = $_FILES['imagem']['tmp_name'];

move_uploaded_file(
$temp,
"../img/".$imagem
);

/* INSERT */

$sql = "INSERT INTO produtosimg

(nome, descricao, preco, imagem)

VALUES

('$nome','$descricao','$preco','$imagem')";

if($conn->query($sql) === TRUE){

    echo "Produto cadastrado!";
    header("Location: produto-done.php");

} else {

    echo "Erro ao cadastrar";

}

?>