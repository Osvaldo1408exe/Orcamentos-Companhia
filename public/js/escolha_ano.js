function addYearButtons(startYear = 2024) {
    const currentYear = new Date().getFullYear();
    const container = document.getElementById("buttonContainer");

    // Limpa os botões antigos para evitar duplicação
    container.innerHTML = "";

    // Adiciona um botão para cada ano, do início ao ano atual
    for (let year = startYear; year <= currentYear; year++) {
        const button = document.createElement("button");
        button.textContent = `${year}/${year + 4}`;
        button.className = "btn";
        button.onclick = () => window.location.href = "./index.php?action=home&orcamento=investimento&ano_execucao=" + year;
        container.appendChild(button);
    }
}

// Chama a função ao carregar a página
addYearButtons();