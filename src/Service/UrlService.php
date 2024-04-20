<?php

namespace App\Service;

use App\Entity\Url;
use App\Repository\UrlRepository;
use Doctrine\ORM\EntityManagerInterface;

class UrlService
{
    const ALFABETO = 'abcdefghijklmnopqrstuvwxyz';

    public function __construct(
        private EntityManagerInterface $entityManager,
        private UrlRepository $urlRepository
    ) { }

    public function gerarUrl(string $urlOriginal): string
    {
        $urlNova = $this->montarUrlNova($urlOriginal);

        $url = new Url();
        $url->setUrlOriginal($urlOriginal);
        $url->setUrlGerada($urlNova);
        $url->setStatus('A');

        $this->entityManager->persist($url);
        $this->entityManager->flush();

        return $url->getUrlGerada();
    }

    private function montarUrlNova(string $urlOriginal): string
    {
        $ano = date('Y');
        $mes = date('m');
        $dia = date('d');
        $hora = date('H');
        $minuto = date('i');
        $segundo = date('s');

        $stringData = $ano.$mes.$dia.$hora.$minuto.$segundo;

        $letrasAleatorias = '';

        for ($i = 0; $i < 4; $i++) {
            $indiceAleatorio =  rand(0, strlen(self::ALFABETO) - 1);
            $letrasAleatorias .= self::ALFABETO[$indiceAleatorio];
        }

        return $_ENV['URL_BASE'].'/'.$letrasAleatorias.$stringData;
    }

    public function obterTodasUrls() {
       return $this->urlRepository->obterTodasUrls();
    }
}
