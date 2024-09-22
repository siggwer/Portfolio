<?php

namespace App\UI\Action;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;

class MentionAction extends AbstractController
{
    /**
     * @param Request $request
     *
     * @return Response
     */
    #[Route('/mention', name: 'app_mention', methods: ['GET'])]
    public function __invoke(Request $request): Response
    {
        return $this->render('mention/mention.html.twig');
    }
}
