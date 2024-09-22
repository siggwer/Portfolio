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
     * @param Request $request
     * @param ContactHandler $contactHandler
     *
     * @return Response
     */
    #[Route('/', name: 'app_home', methods: ['GET', 'POST'])]
    public function __invoke(
        Request $request,
        ContactHandler $contactHandler
    ): Response
    {
        if ($contactHandler->handle($request, new ContactDto())) {
            return $this->redirectToRoute('app_home');
        }

        return $this->render(
            'home/index.html.twig',
            [
                'contactForm' => $contactHandler->createView(),
            ]
        );
    }
}
