const imagemJs = [...document.querySelectorAll("#imagem-js")];

imagemJs.map((elemento) => {
    elemento.addEventListener("mouseover", (evento) => {
      const imagem = evento.target.querySelector(":first-child");
      imagem.classList.add("imagem");
    });
});

imagemJs.map((elemento) => {
    elemento.addEventListener("mouseout", (evento) => {
      const imagem = evento.target.querySelector(":first-child");
      imagem.classList.remove("imagem");
    });
});

