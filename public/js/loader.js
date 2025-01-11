// Aguarda o carregamento completo da página
window.addEventListener("load", function () {
    const loadingScreen = document.querySelector(".loading-screen");
    const content = document.querySelector(".table-container");

    if (loadingScreen && content) {
         setTimeout(() => {
            loadingScreen.classList.add("hidden");

             setTimeout(() => {
                loadingScreen.style.display = "none";
                content.style.display = "block";
            }, 500); 
        }, 400); // Tempo para manter a tela de carregamento visível (700 ms)
    }
});
