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

/* PEGA ID */

$id = $_GET['id'];

/* BUSCA PRODUTO COM A TABELA produtosimg  */

$sql = "SELECT * FROM produtosimg
WHERE id='$id'";

$result = $conn->query($sql);

$produto = $result->fetch_assoc();

/* ATUALIZA PRODUTO */

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $nome = $_POST['nome'];
    $descricao = $_POST['descricao'];
    $preco = $_POST['preco'];
    $diaSemana = $_POST['diaSemana']; // novo campo

    /* VERIFICA NOVA IMAGEM */

    if(!empty($_FILES['imagem']['name'])){
    $imagem = $_FILES['imagem']['name'];
    $tmp = $_FILES['imagem']['tmp_name'];
    move_uploaded_file($tmp, "../assets/img/".$imagem);

    $sqlUpdate = "UPDATE produtosimg SET
        nome='$nome',
        descricao='$descricao',
        preco='$preco',
        diaSemana='$diaSemana',
        imagem='$imagem'
    WHERE id='$id'";
} else {
    $sqlUpdate = "UPDATE produtosimg SET
        nome='$nome',
        descricao='$descricao',
        preco='$preco',
        diaSemana='$diaSemana'
    WHERE id='$id'";
}
    
    if($conn->query($sqlUpdate)){

        header("Location: produtos.php");
        exit();

    }else{

        echo "Erro ao atualizar produto";

    }

}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>

Editar Produtos

</title>

<style>

body{

    font-family:Arial;
    background-image:url('../img/planos-fundobanner.png');
    padding:20px;

}

form{

    background:white;
    width:500px;
    margin:auto;
    padding:30px;
    border-radius:20px;

}

input{

    width:100%;
    padding:12px;
    margin-top:15px;
    border-radius:10px;
    border:1px solid #ccc;

}

button{

    width:100%;
    padding:14px;
    margin-top:20px;
    border:none;
    background:orange;
    color:white;
    border-radius:10px;
    font-size:18px;

}

img{

    width:150px;
    border-radius:15px;
    margin-top:20px;

}

/* HEADER */

header{

    background-image:url('https://vascocoutinho.ceet.secti.es.gov.br/Media/CeetVascoCoutinho/SelecaoAluno2024/IMG-20240618-WA0028.jpg');

    height:180px;

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

<div class="menu">

<a href="logout.php">


</a>


</div>

<h1>

Editar produtos


</h1>

</header>

<h1>Editar produtos</h1>

<form method="POST" enctype="multipart/form-data">

  <input type="text" name="nome" value="<?php echo $produto['nome']; ?>" required>

  <input type="text" name="descricao" value="<?php echo $produto['descricao']; ?>" required>

  <input type="text" name="preco" value="<?php echo $produto['preco']; ?>" required>

  <p>Imagem atual:</p>
  <img src="./img/<?php echo $produto['imagem']; ?>">

  <input type="file" name="imagem">

  <!-- Novo campo para dia da semana -->
  <label for="diaSemana">Dia da semana:</label>
  <select name="diaSemana" id="diaSemana" required>
    <option value="segunda" <?php if($produto['diaSemana']=="segunda") echo "selected"; ?>>Segunda</option>
    <option value="terca" <?php if($produto['diaSemana']=="terca") echo "selected"; ?>>Terça</option>
    <option value="quarta" <?php if($produto['diaSemana']=="quarta") echo "selected"; ?>>Quarta</option>
    <option value="quinta" <?php if($produto['diaSemana']=="quinta") echo "selected"; ?>>Quinta</option>
    <option value="sexta" <?php if($produto['diaSemana']=="sexta") echo "selected"; ?>>Sexta</option>
  </select>

  <button type="submit">Salvar Alterações</button>
</form>


</body>
</html>