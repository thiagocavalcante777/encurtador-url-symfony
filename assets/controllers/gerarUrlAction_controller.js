import { Controller } from '@hotwired/stimulus';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {
    connect() {
        this.element.innerHTML = '<button type="submit" class="btn btn-primary mb-2">Encurtar Url</button>';
        this.count = 0;
        this.element.addEventListener('click', () => {
// Faz uma requisição GET para uma URL específica
            fetch('https://api.example.com/data')
                .then(function(response) {
                    // Verifica se a requisição foi bem-sucedida (código de status 200)
                    if (!response.ok) {
                        throw new Error('Ocorreu um erro na requisição: ' + response.status);
                    }
                    // Retorna a resposta como JSON
                    return response.json();
                })
                .then(function(data) {
                    // Manipula os dados recebidos do servidor
                    console.log(data);
                })
                .catch(function(error) {
                    // Manipula erros, caso ocorram
                    console.error('Ocorreu um erro:', error);
                })
        });
    }
}
