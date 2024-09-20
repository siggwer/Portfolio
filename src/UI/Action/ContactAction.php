<?php

declare(strict_types=1);

namespace App\UI\Action;

use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\UI\Responder\RedirectResponder;
use App\UI\Responder\ViewResponder;
use App\UI\Handler\ContactHandler;
use App\Domain\Dto\ContactDto;

class ContactAction
{
//    /**
//     * @param RedirectResponder $redirectResponder
//     */
//    public function __construct(protected RedirectResponder $redirectResponder)
//    {
//    }
//
//    /**
//     * @param Request $request
//     * @param ViewResponder $viewResponder
//     * @param RedirectResponder $redirectResponder
//     * @param ContactHandler $contactHandler
//     *
//     * @return Response
//     */
//    #[Route('/contact', name: 'app_contact', methods: ['POST'])]
//    public function contact(
//        Request $request,
//        ViewResponder $viewResponder,
//        RedirectResponder $redirectResponder,
//        ContactHandler $contactHandler
//    ): Response
//    {
//        if ($contactHandler->handle($request, new ContactDto())) {
//            return $redirectResponder->redirectToRoute('app_home');
//        } else {
//            throw new BadRequestHttpException('Invalid input');
//        }
//    }
}