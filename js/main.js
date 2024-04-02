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
const valor = document.getElementById('quanti');

menos.addEventListener('click', ()=> {
    valor.innerHTML = valor.innerHTML.value - 1;
})