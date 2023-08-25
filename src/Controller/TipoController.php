<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class TipoController extends AbstractController
{
    #[Route('/tipo', name: 'app_tipo')]
    public function index(): Response
    {
        return $this->render('tipo/index.html.twig', [
            'controller_name' => 'TipoController',
        ]);
    }
}
