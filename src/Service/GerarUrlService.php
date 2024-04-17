<?php

namespace App\Service;

use App\Entity\Url;
use Doctrine\ORM\EntityManagerInterface;

class GerarUrlService
{
    const ALFABETO = 'abcdefghijklmnopqrstuvwxyz';
    const URL_BASE = 'http://deve.encurtador-url.mazaltec.com.br';

    public function __construct(private EntityManagerInterface $entityManager) { }

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

        return self::URL_BASE.'/'.$letrasAleatorias.$stringData;
    }
}