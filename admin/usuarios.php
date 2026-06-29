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

$sql = "SELECT * FROM usuarios ORDER BY id DESC";

$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

<title>

Usuários

</title>

<style>
body{


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



table{

    width:100%;
    background:white;
    border-collapse:collapse;

}

th, td{

    padding:15px;
    border:1px solid #ddd;
    text-align:center;

}

th{

    background:#3196ee;
    color:white;

}

.btn-editar{

    background:orange;
    color:white;
    padding:10px 15px;
    text-decoration:none;
    border-radius:10px;

}

.btn-excluir{

    background:red;
    color:white;
    padding:10px 15px;
    text-decoration:none;
    border-radius:10px;

}
.cadastrar{

    
    background:red;
    color:white;
    padding:10px 15px;
    text-decoration:none;
    border-radius:10px; 
}





*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, sans-serif;
}

body{
    overflow-x:hidden;
}

/* Botão Menu */

.menu-btn{
    position:fixed;
    top:20px;
    left:20px;
    z-index:1001;
    font-size:30px;
    background:none;
    border:none;
    color:black;
    cursor:pointer;
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
    display:block;
    margin-bottom:30px;
    margin-left:25px;
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

/* Banner */

.banner{
    height:100vh;
    background:
    linear-gradient(
        rgba(98,0,255,.7),
        rgba(55,0,255,.7)
    ),
    url('banner.jpg');

    background-size:cover;
    background-position:center;

    color:white;

    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}

.banner h1{
    font-size:70px;
}

.banner p{
    margin-top:20px;
    font-size:22px;
}


--------------------$_COOKIE


/* Botão Menu */

.menu-btn{
    position:fixed;
    top:20px;
    left:20px;
    z-index:1001;
    font-size:30px;
    background:none;
    border:none;
    color:white;
    cursor:pointer;
}

/* Menu Lateral */

.sidebar{
    position:fixed;
    top:0;
    left:-280px;
    width:280px;
    height:100%;
    background:#242424;
    transition:0.4s;
    padding:30px;
    z-index:1000;
    
}

.fechar{
    color:white;
    font-size:35px;
    cursor:pointer;
    display:block;
    margin-bottom:30px;
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

/* Banner */

.banner{
    height:100vh;
    background:
    linear-gradient(
        rgba(98,0,255,.7),
        rgba(55,0,255,.7)
    ),
    url('..img/bravo.png');

    background-size:cover;
    background-position:center;

    color:white;

    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
}

.banner h1{
    font-size:70px;
}

.banner p{
    margin-top:20px;
    font-size:22px;
}




/* HEADER */



header h1{

    text-align:center;
    color:orange;
    font-size:28px;

}
h1{
    text-align: center;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
    color: orangered;
}























</style>

</head>

<body>


<header>


<div class="menu">

<a href="logout.php">


</a>


</div>



</header>





<!-- Botão Menu -->
<button id="abrirMenu" class="menu-btn">
☰
</button> <br> <br>

<!-- Menu Lateral -->
<div id="menuLateral" class="sidebar">

    <span class="fechar" onclick="fecharMenu()">fechar</span>

    <a href="../index.php" class="btn-login">❤ Menu </a>

    <nav>
        <a href="../admin/index.php">DashBoad</a>
        <a href="../admin/produtos.php">Produtos</a>
        <a href="../admin/editar_produtos.php">Editar Produtos</a>
        <a href="../cadastro.php">Novo Usuário</a>
        <a href="#">Suporte</a>
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





<table>

<tr>

<th>ID</th>

<th>Nome</th>

<th>Email</th>

<th>Tipo</th>

<th>Ações</th>

</tr>

<?php while($usuario = $result->fetch_assoc()) { ?>

<tr>

<td>

<?php echo $usuario['id']; ?>

</td>

<td>

<?php echo $usuario['nome']; ?>

</td>

<td>

<?php echo $usuario['email']; ?>

</td>

<td>

<?php echo $usuario['tipo']; ?>

</td>

<td>

<a
class="btn-editar"
href="editar_usuario.php?id=<?php echo $usuario['id']; ?>">

Editar

</a>

<a
class="btn-excluir"
href="excluir_usuario.php?id=<?php echo $usuario['id']; ?>"
onclick="return confirm('Deseja excluir usuário?')">

Excluir

</a>

</td>

</tr>

<?php } ?>

</table>

</body>
</html>