import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        this.element.innerHTML = '<button type="submit" class="btn btn-primary mb-2">Gerar Cpf</button>';

        this.element.addEventListener('click', (e) => {

            e.preventDefault();

            fetch('http://deve.encurtador-url.mazaltec.com.br/gerar-cpf', {
                method: 'POST'
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
                    document.getElementById('input-url-gerada').value = data.cpf_gerado;

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
