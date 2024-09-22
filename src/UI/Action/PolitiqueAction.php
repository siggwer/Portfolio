<?php

declare(strict_types=1);

namespace App\UI\Action;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;


class PolitiqueAction extends AbstractController
{
    #[Route('/politique-de-confidentialite', name: 'app_politique', methods: ['GET'])]
    public function __invoke(Request $request): Response
    {
        return $this->render('politique/politique.html.twig');
    }
}