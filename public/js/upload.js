document.getElementById('form').addEventListener('submit', async function (event) {
    event.preventDefault(); // Evita o envio padrão do formulário

    const form = document.getElementById('form'); // Pega o formulário
    const formData = new FormData(form); // Cria o objeto FormData com os dados do formulário
    
    try {
        const response = await fetch(form.action, { // Usa o action do formulário
            method: 'POST',
            body: formData, // Envia os dados corretamente
        });

        // Verifica se a resposta é JSON
        const contentType = response.headers.get('content-type');
        if (!contentType || !contentType.includes('application/json')) {
            throw new Error('Resposta inválida do servidor!');
        }

        // Lê a resposta
        const result = await response.json();

        // Manipula as respostas
        if (result.status === 'success') {
            alert(result.message); // Mensagem de sucesso
        } else {
            alert('Erro: ' + result.message); // Mensagem de erro
        }
    } catch (error) {
        console.error('Erro na requisição:', error);
        alert('Erro ao processar o arquivo. Verifique os logs do servidor.');
    }
});
