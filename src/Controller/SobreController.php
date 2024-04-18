<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class SobreController extends AbstractController
{

    /**
     * @Route("/sobre", name="sobre", methods={"GET"})
     */
    public function sobreAction(): Response
    {
        return $this->render('sobre.html.twig');
    }
}