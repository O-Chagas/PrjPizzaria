const btnsAddPizza = document.querySelectorAll(".cards-area__botao-adicionar");
console.log(btnsAddPizza);
const modal=document.querySelector(".bkg-modal");


for (let i = 0; i < btnsAddPizza.length; i++) {
    btnsAddPizza[i].addEventListener('click', ()=> {
        //abrirModal();
        console.log("Botão Clicado");
        modal.classList.add("bkg-modal--ativo");
    })
    
}

const btnCancelar = document.querySelector('.botao--vermelho');

btnCancelar.addEventListener('click', ()=> {
    modal.classList.remove("bkg-modal--ativo");
})


const mais = document.querySelector('.modal__btn-add');
const menos = document.querySelector('.modal__btn-remove');
let valor = parseFloat(document.getElementById('quanti').innerHTML);

menos.addEventListener('click', ()=> {
    console.log(valor);
    if (valor == 0) {

    } else {
        valor = valor -1;
        document.getElementById('quanti').innerHTML = valor;
    }
})

mais.addEventListener('click', ()=> {
    console.log(valor);
    valor = valor +1;
    document.getElementById('quanti').innerHTML = valor;
})

const modalP = document.querySelector('.modal--pequena');
const modalM = document.querySelector('.modal--media');
const modalG = document.querySelector('.modal--grande');

modalP.addEventListener('click', ()=> {
    console.log(modalP);
    modalP.classList.add('modal--selected');
    modalM.classList.remove('modal--selected');
    modalG.classList.remove('modal--selected');
})

modalM.addEventListener('click', ()=> {
    console.log(modalM);
    modalM.classList.add('modal--selected');
    modalP.classList.remove('modal--selected');    
    modalG.classList.remove('modal--selected');
})

modalG.addEventListener('click', ()=> {
    console.log(modalG);
    modalG.classList.add('modal--selected');
    modalP.classList.remove('modal--selected');
    modalM.classList.remove('modal--selected');    
})

const btnAddCarrinho = document.querySelector('#modal__botao-adicionar');

btnAddCarrinho.addEventListener('click', ()=> {
    //1 FECHAR MODAL
    //2 FECHAR CARRINHO
    fecharModal();
    abrirCarrinho();
})

function fecharModal() {
    const modal = document.querySelector('.bkg-modal');
    modal.classList.remove('bkg-modal--ativo');
}

function abrirCarrinho() {
    const carrinho = document.querySelector('.carrinho');
    carrinho.classList.add('carrinho--visivel');
}

const btnFecharCarrinho = document.querySelector('.carrinho__fechar');

btnFecharCarrinho.addEventListener('click', ()=> {
    fecharCarrinho();
})

function fecharCarrinho() {
    const carrinho = document.querySelector('.carrinho');
    carrinho.classList.remove('carrinho--visivel');
}
