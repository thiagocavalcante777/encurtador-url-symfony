<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class CpfController extends AbstractController
{

    /**
     * @Route("/cpf", name="gerar_cpf_index", methods={"GET"})
     */
    public function indexAction(): Response
    {
        return $this->render('gerar_cpf.html.twig');
    }
}
