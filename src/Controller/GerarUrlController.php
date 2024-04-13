<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GerarUrlController extends AbstractController
{
    /**
     * @Route("/gerar-url", name="home", methods={"GET"})
     */
    public function homeAction()
    {
        return $this->render('home/home.html.twig');
    }
}
