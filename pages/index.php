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

/* VERIFICA LOGIN */
 
if(!isset($_SESSION['usuario'])){

    header("Location: login.php");
    exit();

}

/* BUSCA PRODUTOS */

$sql = "SELECT * FROM produtosimg ORDER BY id DESC";

$result = $conn->query($sql);

/* CARRINHO */

if(!isset($_SESSION['carrinho'])){

    $_SESSION['carrinho'] = [];

}

$total = 0;

// Pega o dia atual do sistema
$diaSemanaIngles = strtolower(date("l")); // monday, tuesday...
$map = [
  "monday" => "segunda",
  "tuesday" => "terca",
  "wednesday" => "quarta",
  "thursday" => "quinta",
  "friday" => "sexta",
  "saturday" => "sabado",
  "sunday" => "domingo"
];
$diaAtual = $map[$diaSemanaIngles];

// Consulta produtos do dia
$sql = "SELECT * FROM produtosimg WHERE diaSemana='$diaAtual'";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>

<meta charset="UTF-8">

<meta name="viewport"
content="width=device-width, initial-scale=1.0">
<link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />

    <link rel="stylesheet" href="../css/default.css" />

    <link rel="stylesheet" href="../css/header.css" />

    <link rel="stylesheet" href="../css/home.css" />

    <link rel="stylesheet" href="../css/cardapio.css" />

    <link rel="stylesheet" href="../css/carrinho.css" />

    <link rel="stylesheet" href="../css/sobre.css" />

    <link rel="stylesheet" href="../css/footer.css" />

<title>

Cantina Vasco Coutinho

</title>

<style>

*{

    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial, Helvetica, sans-serif;

}

body{

    background-image:url('../assets/img/cap-end.png'); background-repeat: no-repeat; 
    padding:20px;
    background-size: cover;
background-repeat: no-repeat;
background-position: center;



}

/* HEADER */

header{

    background-image:url('../assets/img/telaLogin 23 de mai. de 2026, 18_23_05.png'); 
    height:170px;
    width:100%;
    margin-left:15px;


  
   

}

header h1{

    text-align:center;
    color:orange;
    font-size:28px;

}

/* MENU */

.menu{

    display:flex;
    gap:15px;

}

.menu img{

    width:40px;
    height:40px;

}

/* CLIENTE */

.usuario{

    text-align:center;
    margin-bottom:30px;

}

.usuario label{

    background:#0e3c40;
    color:orange;
    padding:10px 20px;
    border-radius:10px;

}

/* PRODUTOS */

.produtos{

    display:flex;
    flex-wrap:wrap;
    gap:20px;
    justify-content:center;

}
#cards {
  display: flex;
  flex-wrap: wrap;   /* permite quebrar linha se não couber */
  gap: 20px;         /* espaço entre os cards */
}

.card {
  flex: 1 1 250px;   /* cada card ocupa espaço flexível, mínimo 250px */
  max-width: 300px;  /* limite de largura */
   background: var(--cor02);
  border-radius: 8px;
  padding: 10px
     color: #fff;
    padding: 13px 30px;
    margin: 25px 30px 0 0;
    border-radius: 30px 30px 0 30px;
}


.card{

    background: #ffc9b4;

    width:300px;

    border-radius:20px;

    padding:20px;

    box-shadow:0px 0px 10px rgba(0,0,0,0.2);

    text-align:center;

}

.card img{

    width:100%;
    height:220px;
    object-fit:cover;
    border-radius:15px;

}

.card h2{

    margin-top:15px;
    color:#0e3c40;

}

.card p{

    margin-top:10px;

}

.preco{

    color:green;
    font-size:24px;
    font-weight:bold;

}

/* BOTÃO */
.btnComprar{
    display: inline-block;;
    background: var(--cor02);
    color: #fff;
    padding: 13px 30px;
    margin: 25px 30px 0 0;
    border-radius: 30px 30px 0 30px;
    height: 87px;

}
button:hover{

    background:#0e3c40;

}

/* CARRINHO */

.carrinho-container{

    position:fixed;

    top:20px;

    right:20px;

    width:320px;

}

.carrinho-icone{

    background:#white;
    color:white;
    padding:15px;
    border-radius:15px;
    font-size:15px;
    position:relative;
    text-align:center;
    height:81px;
    margin-left:970px;


}

.contador{

    position:absolute;

    top:-10px;

    right:-10px;

    background:red;
    color:white;

    width:25px;

    height:25px;

    border-radius:50%;

    display:flex;

    justify-content:center;

    align-items:center;
    

}

.item{

    background:white;

    padding:15px;

    margin-top:15px;

    border-radius:15px;

    box-shadow:0px 0px 10px rgba(0,0,0,0.1);

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

}

/* Botão Menu */

.menu-btn{
    position:fixed;
    top:20px;
    left:10px;
    font-size:30px;
    background:none;
    border:none;
    color:black;
    cursor:pointer;
    width: 121px;
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
    margin-bottom:30px;
    margin-left:12px;
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
p{
  margin-top: 24px;
  font-size: 21px;
  font-family: 'Times New Roman', Times, serif;
  background-color: ;
  
}


</style>

</head>

<body>
<!--------------------------------------------------->
<header>
<!----Instituição Vasco Coutinho 2026 Vila Velha - ES ------------------------------------------->
<a href="https://vascocoutinho.ceet.secti.es.gov.br/" target="_blank">
<div class="logo"><i class="fas fa-utensils"></i></div>
</a>
<button class="navbar--btnMobile" id="navbar--btnMobile">
<span class="btnMobile--icon"></span>
</button>
<nav class="navbar" id="navbar">
<div class="navbar--links">
<a href="#home" class="animateLink">
<div class="link active">Home<span class="link--linha"></span></div>
</a>
<a href="#cardapio" class="animateLink">
<div class="link">Cardápio<span class="link--linha"></span></div>
</a>
<a href="#sobre" class="animateLink">
<div class="link">Sobre<span class="link--linha"></span></div>
</a>
<a href="#contato" class="animateLink">
<div class="link">Contato<span class="link--linha"></span></div>
</a>
</div>
<div class="navbar--login"> <br> <br>
 <div class="carrinho-icone"> 
<a href="pagamento.php">
    🛒
</a>
<div class="contador">
<?php echo count($_SESSION['carrinho']); ?>
</div>
</div>
<?php
if(count($_SESSION['carrinho']) > 0){
    foreach($_SESSION['carrinho'] as $indice => $item)
    $total += $item['preco'];
}
?>
</span>
</i>
</a>

</div>
</nav>
</header>
<div class="usuario">

<label>
Bem-vindo,
<?php echo $_SESSION['usuario']; ?>
</label>
</div>
   <section class="cardapio" id="cardapio">
  <div class="headerTitle">
    <h1 class="title">Cardápio</h1>
    <span></span>
  </div>

  <!-- Dias da semana -->
  <div class="diasSemana" id="diasSemana">
  <div class="dia" data-dia="segunda" onclick="alteraBtnDiaSemana(this)">Segunda</div>
  <div class="dia" data-dia="terca" onclick="alteraBtnDiaSemana(this)">Terça</div>
  <div class="dia" data-dia="quarta" onclick="alteraBtnDiaSemana(this)">Quarta</div>
  <div class="dia" data-dia="quinta" onclick="alteraBtnDiaSemana(this)">Quinta</div>
  <div class="dia" data-dia="sexta" onclick="alteraBtnDiaSemana(this)">Sexta</div>
</div>




  <!-- Produtos -->
  <div class="produtos">
    <?php while($produtoimg = $result->fetch_assoc()) { ?>
      <div class="card">
        <?php
          $imagem = !empty($produtoimg['imagem']) ? $produtoimg['imagem'] : 'sem-imagem.png';
        ?>
        <img src="../assets/img/<?php echo $imagem; ?>" alt="<?php echo $produtoimg['nome']; ?>">
        <h2><?php echo $produtoimg['nome']; ?></h2>
        <p><?php echo $produtoimg['descricao']; ?></p>
        <p class="preco">
          R$ <?php echo number_format($produtoimg['preco'], 2, ',', '.'); ?>
        </p>

        <form  action="../actions/carrinho.php" method="POST">
            
          <input type="hidden" name="id" value="<?php echo $produtoimg['id']; ?>">
          <input type="hidden" name="nome" value="<?php echo $produtoimg['nome']; ?>">
          <input type="hidden" name="preco" value="<?php echo $produtoimg['preco']; ?>">
          <input type="hidden" name="imagem" value="<?php echo $produtoimg['imagem']; ?>">
          <button class="btnComprar" type="submit">Adicionar ao Carrinho</button>
        </form>
      </div>
    <?php } ?>
  </div>
</section>
<br><br>

<section class="info-1" id="sobre">
      <div class="headerTitle titulo-info-1">
        <h1 class="title">Sobre Nós</h1>
        <span></span>
      </div>

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 mt-5 p-4 align-self-center">
            <img
              class="d-block w-100"
              src="../assets/img/vasco.jpg"
              alt="Imagem turma"
            />
          </div>

          <div class="col-lg-7 mx-4 p-5">
            <h2 style="color: var(--cor04); padding-bottom: 15px">O CEET Vasco Coutinho</h2>
            <p>
            O Centro Estadual de Educação Técnica Vasco Coutinho foi inaugurado no dia 30 de setembro de 2005, 
            pelo Ato de Criação na Portaria SEDU nº 151-R de 06/10/2005, sendo a primeira unidade estadual voltada para 
            o ensino profissional, com a perspectiva de oferecer aos jovens e adultos, formação profissional em nível técnico,
             nas modalidades concomitante e subsequente, possibilitando-lhes melhores chances de inserção no competitivo
            mundo do trabalho. 


            </p>
            <br />
            <p>
              O ano de 2013 foi o de transição dos CEETs, por vezes com ações na SEDU ou na SECTI. Nesse mesmo ano, 
              foi publicada a Lei nº 10.039/2013, alterando alguns artigos da Lei nº 9.971/2012. 
              O grande marco da lei de 2013 foi o reconhecimento do tecnólogo, também, como professor de 
              Educação Profissional e Tecnológica, além de propiciar ao docente que pudesse atuar com: hora-aula,
               hora-planejamento, coordenação de curso e com Projeto de Pesquisa de Enriquecimento Curricular (PPEC).
            </p>
            <br />
            <p>
            O CEET Vasco Coutinho tem como objetivo ofertar cursos que garantam perspectivas de emprego para os jovens
            e adultos facilitando o seu acesso ao mundo do trabalho, e também atender aos profissionais que já estão 
            no mercado, mas sentem falta de uma melhor qualificação para exercerem suas atividades. O Centro Técnico, 
            hoje, oferta 12 (doze) cursos presenciais, divididos por Eixos Tecnológicos, como determina o Catálogo Nacional
            de Cursos Técnicos do Ministério da Educação (BRASIL, 2020). Para melhor entendimento, a seguir, 
            apresentam-se os cursos e seus respectivos eixos tecnológicos:

 
            </p>
          </div>
        </div>
      </div>
    </section>





</body>
<script>
function marcaDiaAtual() {
  const semana = ["domingo","segunda","terca","quarta","quinta","sexta","sabado"];
  let hoje = new Date();
  let diaAtual = semana[hoje.getDay()];

  // Se for sábado ou domingo, cai para segunda
  if (diaAtual === "domingo" || diaAtual === "sabado") {
    diaAtual = "segunda";
  }

  // Remove qualquer ativo anterior
  let ativo = document.querySelector(".activeSemana");
  if (ativo) ativo.classList.remove("activeSemana");

  // Seleciona o botão correspondente ao dia
  let btnDia = document.querySelector(`.dia[data-dia="${diaAtual}"]`);
  if (btnDia) {
    btnDia.classList.add("activeSemana");
    alteraBtnDiaSemana(btnDia); // já atualiza os cards
  }
}

window.onload = marcaDiaAtual;
</script>
</html>