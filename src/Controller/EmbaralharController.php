<?php

namespace App\Controller;

use App\Service\EmbaralharService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class EmbaralharController extends AbstractController
{
    public function __construct(private EmbaralharService $embaralharService)
    {
    }

    /**
     * @Route("/embaralhar", name="embaralhar_index", methods={"GET"})
     */
    public function indexAction()
    {
        return $this->render('embaralhar_caracteres.html.twig');
    }

    /**
     * @Route("/embaralhar", name="embaralhar", methods={"POST"})
     */
    public function embaralharAction(Request $request)
    {
        $conteudoJson = $request->getContent();

        $array = json_decode($conteudoJson, true);

        return new JsonResponse($this->embaralharService->embaralhar($array['caracteres']), Response::HTTP_OK);
    }
}