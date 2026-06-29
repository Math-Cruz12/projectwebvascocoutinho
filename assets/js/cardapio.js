let comidas = [
  {
    _id: "6245cd054c41f3195ff0f637",
    nome: "Água Mineral",
    tipoProduto: "bebida",
    preco: 2.5,
    imagem: "./images/agua.jpg",
    diaSemana: null,
    descricao: "500ml",
    __v: 0,
  },
  {
    _id: "6245cd744c41f3195ff0f639",
    nome: "Fanta Laranja",
    tipoProduto: "bebida",
    preco: 3.5,
    imagem: "./images/fanta.jpg",
    diaSemana: null,
    descricao: "350ml",
    __v: 0,
  },
  {
    _id: "6245cdd74c41f3195ff0f63b",
    nome: "Coca-Cola",
    tipoProduto: "bebida",
    preco: 3.5,
    imagem: "./images/coca.jpg",
    diaSemana: null,
    descricao: "350ml",
    __v: 0,
  },
  {
    _id: "6245ce764c41f3195ff0f63d",
    nome: "Suco de Uva",
    tipoProduto: "bebida",
    preco: 3,
    imagem: "./images/sucoUva.jpg",
    diaSemana: null,
    descricao: "290ml",
    __v: 0,
  },
  {
    _id: "6245d3e04c41f3195ff0f63f",
    nome: "Suco de Laranja",
    tipoProduto: "bebida",
    preco: 3,
    imagem: "./images/sucoLaranja.jpg",
    diaSemana: null,
    descricao: "290ml",
    __v: 0,
  },
  {
    _id: "6245e123d954badd5f1c8476",
    nome: "Pão de Queijo",
    tipoProduto: "comida",
    preco: 1.5,
    imagem: "./images/paoDeQueijo.jpg",
    diaSemana: "segunda",
    descricao: "50g",
    __v: 0,
  },
  {
    _id: "6245e22a61c46cc8c9eab8a6",
    nome: "Mini-Pizza",
    tipoProduto: "comida",
    preco: 5,
    imagem: "./images/miniPizza.jpg",
    diaSemana: "terca",
    descricao: "200g",
    __v: 0,
  },
  {
    _id: "6245e28361c46cc8c9eab8a8",
    nome: "Bolo Nega Maluca",
    tipoProduto: "comida",
    preco: 5,
    imagem: "./images/bolo.jpg",
    diaSemana: "quarta",
    descricao: "200g",
    __v: 0,
  },
  {
    _id: "6245e2e161c46cc8c9eab8aa",
    nome: "Cheesecake",
    tipoProduto: "comida",
    preco: 6,
    imagem: "./images/cheesecake.jpg",
    diaSemana: "terca",
    descricao: "170g",
    __v: 0,
  },
  {
    _id: "6245e3ca61c46cc8c9eab8ac",
    nome: "Brigadeiro",
    tipoProduto: "comida",
    preco: 2,
    imagem: "./images/brigadeiro.jpg",
    diaSemana: "quinta",
    descricao: "40g",
    __v: 0,
  },
  {
    _id: "6245e46c61c46cc8c9eab8ae",
    nome: "Beijinho",
    tipoProduto: "comida",
    preco: 2,
    imagem: "./images/beijinho.jpg",
    diaSemana: "quinta",
    descricao: "40g",
    __v: 0,
  },
  {
    _id: "6245e54e61c46cc8c9eab8b0",
    nome: "Panqueca",
    tipoProduto: "comida",
    preco: 6,
    imagem: "./images/panqueca.jpg",
    diaSemana: "terca",
    descricao: "170g",
    __v: 0,
  },
  {
    _id: "6245ecac7e1e256134010453",
    nome: "Bolo Nega Maluca",
    tipoProduto: "comida",
    preco: 5,
    imagem: "./images/bolo.jpg",
    diaSemana: "sexta",
    descricao: "200g",
    __v: 0,
  },
  {
    _id: "6245e3ca61c46cc8c9eab8af",
    nome: "Brigadeiro",
    tipoProduto: "comida",
    preco: 2,
    imagem: "./images/brigadeiro.jpg",
    diaSemana: "terca",
    descricao: "40g",
    __v: 0,
  },
  {
    _id: "6245e46c61c46cc8c9eab8ae",
    nome: "Beijinho",
    tipoProduto: "comida",
    preco: 2,
    imagem: "./images/beijinho.jpg",
    diaSemana: "terca",
    descricao: "40g",
    __v: 0,
  },
  {
    _id: "6245e123d954badd5f1c8476",
    nome: "Pão de Queijo",
    tipoProduto: "comida",
    preco: 1.5,
    imagem: "./images/paoDeQueijo.jpg",
    diaSemana: "quarta",
    descricao: "50g",
    __v: 0,
  },
  {
    _id: "6245e2e161c46cc8c9eab8aa",
    nome: "Cheesecake",
    tipoProduto: "comida",
    preco: 6,
    imagem: "./images/cheesecake.jpg",
    diaSemana: "quinta",
    descricao: "170g",
    __v: 0,
  },
  {
    _id: "6245e123d954badd5f1c8476",
    nome: "Pão de Queijo",
    tipoProduto: "comida",
    preco: 1.5,
    imagem: "./images/paoDeQueijo.jpg",
    diaSemana: "sexta",
    descricao: "50g",
    __v: 0,
  },
];

//#region Tarefas Iniciais

/* async function carregaProdutos() {
    await fetch('http://localhost:3000/produtos').then(res => {
        res.json().then(json => {
            json.forEach(produto => {
                comidas.push(produto)
            })
        })
    }).catch(error => {
        console.log(error);
    })

    carregaDiaSemana()
} */

function carregaDiaSemana() {
  let semana = [
    "domingo",
    "segunda",
    "terca",
    "quarta",
    "quinta",
    "sexta",
    "sabado",
  ];
  let date = new Date();

  let diaAtual = semana[date.getDay()];

  if (diaAtual == "domingo" || diaAtual == "sabado") {
    diaAtual = "segunda";
  }

  let listaDias = document.querySelectorAll(".dia");

  for (let tagBtnDiaSemana of listaDias) {
    let diaSemana = verificaDiaSemanaBtn(tagBtnDiaSemana);

    if (diaSemana == diaAtual) {
      alteraBtnDiaSemana(tagBtnDiaSemana, diaSemana);
      break;
    }
  }
}

//#endregion

//#region Eventos

function alteraBtnDiaSemana(tagBtnDiaSemana) {
  let tagBtnDiaSemanaAtivo = document.querySelector(".activeSemana");
  let diaSemana = verificaDiaSemanaBtn(tagBtnDiaSemana);

  tagBtnDiaSemanaAtivo.classList.remove("activeSemana");
  tagBtnDiaSemana.classList.add("activeSemana");

  let bVerificaBebida = diaSemana == "bebida" ? true : false;

  atualizaCards(diaSemana, bVerificaBebida);
}

function atualizaCards(diaSemana, bVerificaBebida) {
  let cards = document.querySelector("#cards");
  cards.innerHTML = "";

  let arrayFiltrado;

  if (bVerificaBebida) {
    arrayFiltrado = filtraBebidas();
  } else {
    arrayFiltrado = filtraComidasDiaSemana(diaSemana);
  }

  arrayFiltrado.forEach((item) => {
    cards.innerHTML += ` 
        <div class="card">
            <div class="cardImg">
                <img src=${item.imagem} alt="imgProduto">
            </div>
            <div class="cardBody">
                <h3>${item.nome}</h3>
                <div class="precoQuantidade">
                    <p>R$${item.preco.toFixed(2)}</p>
                    <div class="quantidade">
                        <button onclick="decrementClick('a${
                          item._id
                        }')">-</button>
                        <p class="num-contador" id=a${
                          item._id
                        } data-contador="1">1</p>
                        <button onclick="incrementClick('a${
                          item._id
                        }')">+</button>
                    </div>
                </div>
                <p><i class="fas fa-balance-scale"></i> ${
                  item.descricao
                } Unidade</p>
                <button class="btnComprar" onclick="addCarrinho('a${
                  item._id
                }', '${item.nome}', ${item.preco}, '${
      item.imagem
    }')">Comprar</button>
            </div>
        </div>
        `;
  });
}

function verificaDiaSemanaBtn(tagBtnDiaSemana) {
  let diaSemana = tagBtnDiaSemana.getAttribute("data-dia");

  return diaSemana;
}

function filtraComidasDiaSemana(diaSemana) {
  let arrayComidasFiltrado = comidas.filter((comida) => {
    return comida.diaSemana == diaSemana;
  });

  return arrayComidasFiltrado;
}

function filtraBebidas() {
  arrayBebidasFiltrado = comidas.filter((bebida) => {
    return bebida.tipoProduto == "bebida";
  });

  return arrayBebidasFiltrado;
}

//#region contador

function incrementClick(id, contadorPedido = false) {
  let { tagContador, valorContador } = dadosContador(id);
  ++valorContador;

  verificaContadorPedido(contadorPedido, id, tagContador, valorContador);

  updateDisplay(tagContador, valorContador);
}

function decrementClick(id, contadorPedido = false) {
  let { tagContador, valorContador } = dadosContador(id);

  if (valorContador == 1 && contadorPedido == true) {
    removeCarrinho(id);
  } else if (valorContador == 1) {
    valorContador = 1;
  } else {
    --valorContador;
  }

  verificaContadorPedido(contadorPedido, id, tagContador, valorContador);

  updateDisplay(tagContador, valorContador);
}

function updateDisplay(tagContador, valorContador) {
  tagContador.setAttribute("data-contador", valorContador);

  tagContador.innerHTML = valorContador;
}

function dadosContador(id) {
  let tagContador = document.querySelector(`#${id}`);
  let valorContador = Number(tagContador.getAttribute("data-contador"));

  return { tagContador, valorContador };
}

function verificaContadorPedido(
  contadorPedido,
  id,
  tagContador,
  valorContador
) {
  if (contadorPedido) {
    atualizaQtdItensCarrinho(id, tagContador, valorContador);
    atualizaSubTotal();
  }
}


function marcaDiaAtual() {
  const semana = [
    "domingo",
    "segunda",
    "terca",
    "quarta",
    "quinta",
    "sexta",
    "sabado",
  ];

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
    alteraBtnDiaSemana(btnDia); // já chama sua função para atualizar os cards
  }
}

// Chame essa função quando a página carregar
window.onload = marcaDiaAtual;

//#endregion

//#endregion