const submenu_cadastros = [...document.querySelectorAll("#submenu_cadastros")];

// Cadastro
submenu_cadastros.map((elemento) => {
    elemento.addEventListener("click", (evento) => {
        const submenu = evento.target;
        submenu.classList.toggle("submenu");
    });
});