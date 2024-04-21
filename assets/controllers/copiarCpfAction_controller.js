import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    connect() {
        this.element.innerHTML = '<button type="submit" class="btn btn-secondary mb-2">Copiar Url</button>';

        this.element.addEventListener('click', (e) => {
            let url_gerada = document.getElementById('cpf-gerado').value

            // Crie um elemento de área de texto temporário
            const textarea = document.createElement('textarea');
            textarea.value = url_gerada;

            // Adicione o elemento ao corpo do documento
            document.body.appendChild(textarea);

            // Selecione o texto na área de texto
            textarea.select();

            // Copie o texto selecionado
            document.execCommand('copy');

            // Remova o elemento de área de texto temporário
            document.body.removeChild(textarea);

            // Altere o texto do botão para "Copiado"
            this.element.innerHTML = '<button type="submit" class="btn btn-success mb-2">Cpf Copiado</button>';
        });
    }
}
