<?php

namespace App\Service;

use App\Entity\Url;
use App\Repository\UrlRepository;

class UrlService
{
    const CARACTERES = 'abcdefghijklmnopqrstuvwxyz0123456789-&$#@!)([]{}/|+?';

    public function __construct(
        private UrlRepository $urlRepository
    ) { }

    public function gerarUrl(string $urlOriginal): array
    {
        $path = $this->gerarPath();
        $urlNova = $this->montarUrlNova($path);

        $url = new Url();
        $url->setUrlOriginal($urlOriginal);
        $url->setUrlGerada($urlNova);
        $url->setStatus('A');
        $url->setPath($path);

        $this->urlRepository->salvar($url);

        return [
            'url_gerada' => $urlNova
        ];
    }

    private function gerarPath()
    {
        return substr(str_shuffle(self::CARACTERES), 0, 5);
    }

    private function montarUrlNova(string $path): string
    {
        return $_ENV['URL_BASE'].'/'.$path;
    }

    public function obterTodasUrls() {
       return $this->urlRepository->obterTodasUrls();
    }
}
