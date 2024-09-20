<?php

declare(strict_types=1);

namespace App\UI\Action;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\UI\Handler\ContactHandler;
use App\Domain\Dto\ContactDto;

class HomeAction extends AbstractController
{
    /**
     * @param ContactHandler $contactHandler
     */
    public function __construct(private readonly ContactHandler $contactHandler)
    {
    }

    /**
     * @param Request $request
     *
     * @return Response
     */
    #[Route('/', name: 'app_home', methods: ['GET', 'POST'])]
    public function home(
        Request $request
    ): Response
    {
        // Appel de la méthode handle() pour initialiser le formulaire
//        $isHandled = $this->contactHandler->handle($request);

        // Si le formulaire est soumis et valide, on peut rediriger
//        if ($isHandled) {
//            return $viewResponder('app_home');
//        }

        if ($this->contactHandler->handle($request, new ContactDto())) {
            return $this->redirectToRoute('app_home');
        }

        // Si le formulaire n'est pas soumis ou n'est pas valide, on l'affiche
        return $this->render(
            'home/index.html.twig',
            [
                'contactForm' => $this->contactHandler->createView(),
            ]
        );
    }
}
