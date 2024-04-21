<?php

namespace App\Controller;

use App\Service\CpfService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CpfController extends AbstractController
{
    public function __construct(private CpfService $cpfService) 
    {
    }

    /**
     * @Route("/cpf", name="gerar_cpf_index", methods={"GET"})
     */
    public function indexAction(): Response
    {
        return $this->render('gerar_cpf.html.twig');
    }
    
    /**
     * @Route("/gerar-cpf", name="gerar_cpf", methods={"POST"})
     */
    public function gerarCpfAction()
    {
        return new JsonResponse($this->cpfService->gerarCpf(), Response::HTTP_OK) ;
    }
}
