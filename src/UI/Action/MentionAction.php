<?php

namespace App\UI\Action;

use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use App\UI\Responder\ViewResponder;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Twig\Error\LoaderError;

/**
 * Class MentionAction
 *
 * @package App\UI\Action
 *
 */
class MentionAction
{
    /**
     * @param Request       $request
     * @param ViewResponder $viewResponder
     *
     * @return Response
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    #[Route('/mention', name: 'app_mention', methods: ['GET'])]
    public function __invoke(Request $request, ViewResponder $viewResponder): Response
    {
        return $viewResponder(
            'mention/mention.html.twig'
        );
    }
}
