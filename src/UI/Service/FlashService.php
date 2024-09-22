<?php

declare(strict_types=1);

namespace App\UI\Service;

use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\HttpFoundation\RequestStack;

readonly class FlashService
{
    /**
     * @var FlashBagInterface
     */
    private FlashBagInterface $flashBag;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(private RequestStack $requestStack)
    {
        // Récupérer la session et le flash bag
        $session = $this->requestStack->getSession();
        $this->flashBag = $session->getFlashBag();
    }

    /**
     * Ajouter un message flash à la session.
     *
     * @param string $type Le type de message (e.g. 'success', 'error').
     * @param string $message Le message à afficher.
     *
     * @return void
     */
    public function addMessage(string $type, string $message): void
    {
        // Ajoute directement le message flash
        $this->flashBag->add($type, $message);
    }
}