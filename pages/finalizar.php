<?php

session_start();

/* CONEXÃO */
$conn = new mysqli(
    "localhost",
    "root",
    "",
    "cantina"
);

/* VERIFICA CONEXÃO */
if($conn->connect_error){
    die("Erro na conexão com o banco");
}

/* VERIFICA SE EXISTE CARRINHO */
if(!isset($_SESSION['carrinho']) || count($_SESSION['carrinho']) == 0){
    echo "Carrinho vazio";
     header("Location: index.php");
    exit();
}

/* RECEBE CLIENTE */
$cliente = $_POST['cliente'];

/* TOTAL DA VENDA */
$total = 0;
foreach($_SESSION['carrinho'] as $item){
    $total += $item['preco'];
}

/* INSERE VENDA */
$sqlVenda = "INSERT INTO vendas (cliente, total) VALUES ('$cliente', '$total')";

/* EXECUTA */
if($conn->query($sqlVenda) === TRUE){

    /* ID DA VENDA */
    $venda_id = $conn->insert_id;

    /* INSERE ITENS */
    foreach($_SESSION['carrinho'] as $item){
        $produto = $item['nome'];
        $preco = $item['preco'];

        $sqlItem = "INSERT INTO item_vendas (venda_id, produto_nome, preco)
                    VALUES ('$venda_id', '$produto', '$preco')";

        $conn->query($sqlItem);
    }

    /* LIMPA CARRINHO */
    unset($_SESSION['carrinho']);

    /* REDIRECIONA */
    header("Location: pedido_feito.php");
    exit();

}else{
    echo "Erro ao finalizar pedido";
}

?>
