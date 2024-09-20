<?php

declare(strict_types=1);

namespace App\UI\Subscriber;

use Symfony\Component\HttpFoundation\Session\Flash\FlashBagInterface;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpKernel\KernelEvents;

/**
 * Class FlashMessageSubscriber
 *
 * @package App\UI\Subscriber
 */
class FlashMessageSubscriber implements EventSubscriberInterface
{
    /**
     * @var FlashBagInterface
     */
    private FlashBagInterface $flashBag;

    /**
     * @param RequestStack $requestStack
     */
    public function __construct(RequestStack $requestStack)
    {
        // On récupère la session depuis la requête actuelle
        $session = $requestStack->getCurrentRequest()->getSession();

        // Vérifier que la session existe avant de récupérer le FlashBag
        $this->flashBag = $session->getFlashBag();
    }

    /**
     * @param ResponseEvent $event
     *
     * @return void
     */
    public function onKernelResponse(ResponseEvent $event): void
    {
        // Exemple : Ajoute un flash message avant la réponse
        // $this->flashBag->add('success', 'This is a flash message added on kernel response.');
    }

    /**
     * @return string[]
     */
    public static function getSubscribedEvents(): array
    {
        return [
            KernelEvents::RESPONSE => 'onKernelResponse',
        ];
    }
}
