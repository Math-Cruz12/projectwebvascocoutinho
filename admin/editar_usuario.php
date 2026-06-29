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

/* CONEXÃO COM BANCO */

$conn = new mysqli(
    "localhost",
    "root",
    "",
    "cantina"
);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

/* VERIFICA ADMIN */

if (!isset($_SESSION['tipo']) || $_SESSION['tipo'] != "admin") {
    header("Location: ../index.php");
    exit();
}

/* PEGA ID */


$id = intval($_GET['id']);

/* BUSCA USUÁRIO */

$sql = "SELECT * FROM usuarios WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows == 0) {
    die("Usuário não encontrado.");
}

$usuarios = $result->fetch_assoc();

/* ATUALIZA USUÁRIO */

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $nome = $conn->real_escape_string($_POST['nome']);
    $email = $conn->real_escape_string($_POST['email']);
    $senha = $conn->real_escape_string($_POST['senha']);
    $tipo = $conn->real_escape_string($_POST['tipo']);

    $sqlUpdate = "UPDATE usuarios SET
        nome = '$nome',
        email = '$email',
        senha = '$senha',
        tipo = '$tipo'
        WHERE id = $id";

    if ($conn->query($sqlUpdate)) {

        header("Location: usuarios.php");
        exit();

    } else {

        echo "Erro ao atualizar usuário: " . $conn->error;

    }
}

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
<meta charset="UTF-8">
<title>Editar Usuário</title>

<style>

body{
    font-family: Arial, sans-serif;
    
    background-image:url('../img/planos-fundobanner.png');
    padding:20px;
    padding: 30px;
}

form{
    background: white;
    width: 500px;
    margin: auto;
    padding: 30px;
    border-radius: 20px;
    box-shadow: 0 0 10px rgba(0,0,0,0.1);
    margin-top:200px;
}

h2{
    text-align: center;
}

input, select{
    width: 100%;
    padding: 12px;
    margin-top: 15px;
    border-radius: 10px;
    border: 1px solid #ccc;
    box-sizing: border-box;
}

button{
    width: 100%;
    padding: 14px;
    margin-top: 20px;
    border: none;
    background: orange;
    color: white;
    border-radius: 10px;
    font-size: 18px;
    cursor: pointer;
}

button:hover{
    opacity: 0.9;
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


















h1{
    text-align: center; 
}


</style>

</head>

<body>




<form  method="POST">

    <h2>Editar Usuário</h2>













    

    <label> Nome </label> <br>
    <input
        type="text"
        name="nome"
        value="<?php echo $usuarios['nome']; ?>"
        required
    >
     <label> E-mail </label> <br>
    <input
        type="email"
        name="email"
        value="<?php echo $usuarios['email']; ?>"
        required
    >
     <label> Nova Senha </label> <br>
    <input
        type="password"
        name="senha"
        value="<?php echo $usuarios['senha']; ?>"
        required
    >
       <label> Tipo </label> <br>
    <select name="tipo" required>

        <option value="admin"
        <?php if($usuarios['tipo'] == 'admin') echo 'selected'; ?>>
            Admin
        </option>

        <option value="aluno"
        <?php if($usuarios['tipo'] == 'aluno') echo 'selected'; ?>>
            Aluno 
        </option>

        <option value="professor"
        <?php if($usuarios['tipo'] == 'professor') echo 'selected'; ?>>
            professor
        </option>

        <option value="funcionario"
        <?php if($usuarios['tipo'] == 'funcionario') echo 'selected'; ?>>
            funcionário
        </option>

    </select>

    <button type="submit">
        Salvar Alterações
    </button>

</form>

</body>
</html>