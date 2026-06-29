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

/* VERIFICA ID */

if(isset($_GET['id'])){

    $id = $_GET['id'];

    /* BUSCA IMAGEM */

    $sqlImagem = "SELECT imagem FROM produtosimg
    WHERE id='$id'";

    $resultImagem = $conn->query($sqlImagem);

    $produto = $resultImagem->fetch_assoc();

    /* REMOVE IMAGEM DA PASTA */

    if(!empty($produto['imagem'])){

        unlink("../img/".$produto['imagem']);

    }

    /* EXCLUI PRODUTO */

    $sql = "DELETE FROM produtosimg
    WHERE id='$id'";

    if($conn->query($sql) === TRUE){
        echo "Produtos excluído!";
    } else {
        echo "Erro ao excluir";
    }
}

header("Location: index.php");
exit();

?>
?>