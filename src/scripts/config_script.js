const imagemJs = [...document.querySelectorAll("#imagem-js")];

imagemJs.map((elemento) => {
    elemento.addEventListener("mouseover", (evento) => {
      const imagem = evento.target;
      imagem.classList.add("imagem");
    });
});

imagemJs.map((elemento) => {
    elemento.addEventListener("mouseout", (evento) => {
      const imagem = evento.target;
      imagem.classList.remove("imagem");
    });
});

