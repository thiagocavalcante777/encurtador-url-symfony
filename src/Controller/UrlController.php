<?php

namespace App\Controller;

use App\Service\UrlService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class UrlController extends AbstractController
{
    public function __construct(private UrlService $urlService) { }

    /**
     * @Route("/gerar-url", name="gerar_url", methods={"POST"})
     */
    public function gerarUrlAction(Request $request): Response
    {
        $urgOriginal = $request->get('url_original');
        $urlNova = $this->urlService->gerarUrl($urgOriginal);

        return new JsonResponse($urlNova, Response::HTTP_OK) ;
    }


    /**
     * @Route("/obter-todas-urls", name="obter_todas_urls", methods={"GET"})
     */
    public function obterTodasUrlsAction()
    {
        $dados = $this->urlService->obterTodasUrls();

        return new JsonResponse($dados, Response::HTTP_OK) ;
    }
}
