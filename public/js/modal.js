function toggleModal(button) {
    const modalEditar = document.getElementById("modalEditar");

    // Capturar os dados do botão
    const id = button.getAttribute('data-id');
    const situacao = button.getAttribute('data-situacao');
    const processoSei = button.getAttribute('data-processo_sei');

    // Preencher os campos do modal
    document.getElementById('edit-id').value = id;
    document.getElementById('processoSei').value = processoSei;
    document.getElementById('edit-situacao').value = situacao;

    // abre o modal
    modalEditar.classList.toggle("show");
}


function closeModal() {
    modalEditar.classList.toggle("show");
}
  
function mask(){
    const input = document.getElementById('processoSei');

    input.addEventListener('input', function (e) {
        let value = e.target.value;
    
        // Remove qualquer caractere não numérico
        value = value.replace(/\D/g, '');
    
        // Adiciona a máscara
        value = value
            .replace(/^(\d{2})(\d)/, '$1.$2') 
            .replace(/^(\d{2}\.\d)(\d{1})(\d)/, '$1.$2$3') 
            .replace(/^(\d{2}\.\d\.\d{6})(\d)/, '$1-$2');
    
        
        e.target.value = value;
    });
}
