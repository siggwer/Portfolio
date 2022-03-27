<?php

declare(strict_types=1);

namespace App\UI\Action;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\UI\Responder\ViewResponder;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

/**
 * Class HomeAction
 *
 * @package App\UI\Action
 */
class HomeAction extends AbstractController
{
    /**
     * @param ViewResponder $viewResponder
     * @return Response
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    #[Route('/', name:'home', methods: ['GET'])]
    public function index(ViewResponder $viewResponder) : Response
    {
        return $viewResponder('home/home.html.twig');
    }
}