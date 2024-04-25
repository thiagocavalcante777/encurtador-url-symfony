import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        this.element.innerHTML = '<button type="submit" class="btn btn-secondary mb-2">Embaralhar</button>';

        this.element.addEventListener('click', (e) => {

            e.preventDefault();

            const requestData = {
                caracteres: document.getElementById('caracteres').value
            };

            fetch('http://deve.many-tools.mazaltec.com.br/embaralhar', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(requestData)
            })
                .then(function(response) {
                    // Verifica se a requisição foi bem-sucedida (código de status 200)
                    if (!response.ok) {
                        return response.json().then(function(data) {
                            throw new Error(data);
                        });
                    }
                    // Retorna a resposta como JSON
                    return response.json();
                })
                .then(function(data) {
                    console.log(data.caracteres_embaralhados);
                    // Manipula os dados recebidos do servidor
                    document.getElementById('caracteres').value = data.caracteres_embaralhados;
                })
                .catch(function(error) {
                    alert(error);
                    // Manipula erros, caso ocorram
                    console.error(error, error);
                })
        });
    }
}
