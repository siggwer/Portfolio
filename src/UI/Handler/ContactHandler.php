<?php

declare(strict_types=1);

namespace App\UI\Handler;

use Symfony\Contracts\EventDispatcher\EventDispatcherInterface;
use Symfony\Component\Form\FormFactoryInterface;
use App\UI\Service\MailerService;
use App\UI\Service\FlashService;
use App\UI\Event\ContactEvent;
use App\Domain\Dto\ContactDto;
use App\UI\Form\ContactType;

/**
 * Class ContactHandler
 *
 * @package App\UI\Handler
 */
class ContactHandler extends AbstractHandler
{
    /**
     * @param FormFactoryInterface $formFactory
     * @param MailerService $mailerService
     * @param EventDispatcherInterface $eventDispatcher
     * @param FlashService $flashService
     */
    public function __construct(
        protected FormFactoryInterface $formFactory,
        protected readonly MailerService $mailerService,
        private readonly EventDispatcherInterface $eventDispatcher,
        protected FlashService $flashService,
    ){
        parent::__construct($formFactory);
    }

    /**
     * Traite les données du formulaire de contact.
     *
     * @param ContactDto|null $data
     *
     * @return void
     */
    public function process($data = null): void
    {
        $event = new ContactEvent(
            $data->getName(),
            $data->getEmail(),
            $data->getSubject(),
            $data->getMessage(),
        );

        $this->eventDispatcher->dispatch($event, ContactEvent::NAME);
        $this->flashService->addMessage('success', 'Le mail a bien été envoyé');

    }

    /**
     * Retourne la classe du type de formulaire à utiliser.
     *
     * @return string
     */
    public function getFormType(): string
    {
        return ContactType::class;
    }
}
