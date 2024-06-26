import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        this.element.innerHTML = '<button type="submit" class="btn btn-primary mb-2">Encurtar Url</button>';

        this.element.addEventListener('click', (e) => {

            e.preventDefault();

            const requestData = {
                url_original: document.getElementById('input-url').value
            };

            fetch('http://deve.many-tools.mazaltec.com.br/gerar-url', {
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
                    // Manipula os dados recebidos do servidor
                    console.log(data.url_gerada);
                    document.getElementById('input-url-gerada').value = data.url_gerada;

                    var gerar_url_section  = document.getElementById('gerar-url-section');
                    gerar_url_section.style.display = 'none';

                    var url_gerada_section  = document.getElementById('url-gerada-section');
                    url_gerada_section.style.display = 'flex';
                })
                .catch(function(error) {
                    alert(error);
                    // Manipula erros, caso ocorram
                    console.error(error, error);
                })
        });
    }
}
