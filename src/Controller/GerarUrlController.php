<?php

namespace App\Controller;

use App\Service\GerarUrlService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class GerarUrlController extends AbstractController
{
    public function __construct(private GerarUrlService $gerarUrlService) { }

    /**
     * @Route("/gerar-url", name="gerar_url", methods={"POST"})
     */
    public function homeAction(Request $request): Response
    {
        $urgOriginal = $request->get('url_original');
        $urlNova = $this->gerarUrlService->gerarUrl($urgOriginal);

        return new JsonResponse($urlNova, Response::HTTP_OK) ;
    }
}
