<?php

declare(strict_types=1);

namespace App\UI\Service;

use Symfony\Component\HttpFoundation\RequestStack;

readonly class FlashService
{
//    /**
//     * @var FlashBagInterface
//     */
//    private FlashBagInterface $flashBag;
//
//    /**
//     * @param SessionInterface $session
//     */
//    public function __construct(private SessionInterface $session)
//    {
//        // On récupère le FlashBag à partir de la session
//        $this->flashBag = $session->getFlashBag();
//    }
//
//    /**
//     * @param string $message
//     *
//     * @return void
//     */
//    public function addSuccess(string $message): void
//    {
//        $this->flashBag->add('success', $message);
//    }
//
//    /**
//     * @param string $message
//     *
//     * @return void
//     */
//    public function addError(string $message): void
//    {
//        $this->flashBag->add('error', $message);
//    }

    /**
     * @var bool|null
     */
    private ?bool $handlingResult;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(private RequestStack $requestStack)
    {
        $this->handlingResult = null;

    }

    /**
     * @param string $type
     * @param string $message
     *
     * @return void
     */
    public function addMessage(string $type, string $message): void
    {
        if ($this->handlingResult !== null) {
            if ($this->handlingResult) {
                $this->requestStack->getSession()->getFlashBag()->add($type, $message);
            } else {
                $this->requestStack->getSession()->getFlashBag()->add('error', 'Une erreur s\'est produite lors du traitement.');
            }
        }
    }
}