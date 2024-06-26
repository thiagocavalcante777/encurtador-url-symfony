<?php

namespace App\Controller;

use App\Service\UrlService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\Encoder\JsonDecode;

class UrlController extends AbstractController
{
    public function __construct(private UrlService $urlService) { }

    /**
     * @Route("/", name="gerar_url_index", methods={"GET"})
     */
    public function indexAction(): Response
    {
        return $this->render('gerar_url.html.twig');
    }

    /**
     * @Route("/gerar-url", name="gerar_url", methods={"POST"})
     */
    public function gerarUrlAction(Request $request): Response
    {
        $conteudoJson = $request->getContent();

        $array = json_decode($conteudoJson, true);

        if (empty($array['url_original'])) {
            return new JsonResponse('Necessário informa uma url válida', Response::HTTP_BAD_REQUEST) ;
        }

        $urlNova = $this->urlService->gerarUrl($array['url_original']);

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

    /**
     * @Route("/lk/{urlGerada}", name="redirecionar", methods={"GET"})
     */
    public function redirecionarUrlAction(string $urlGerada): RedirectResponse
    {
        $urlOriginal = $this->urlService->obterUrlOriginal($urlGerada);

        return new RedirectResponse($urlOriginal['urlOriginal']);
    }
}
