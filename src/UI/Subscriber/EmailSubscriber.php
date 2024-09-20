<?php

declare(strict_types=1);

namespace App\UI\Subscriber;



use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use App\UI\Service\MailerService;
use App\UI\Event\ContactEvent;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;

class EmailSubscriber implements EventSubscriberInterface
{
    /**
     * @param MailerService $mailerService
     */
    public function __construct(protected MailerService $mailerService)
    {
    }

    /**
     * @return string[]
     */
    public static function getSubscribedEvents(): array
    {
        return [
            ContactEvent::NAME => 'onContact'
        ];
    }

    /**
     * @throws TransportExceptionInterface
     */
    public function onContact(ContactEvent $event) :void
    {
//        $from = [
//            'email' => 'admin.snowtrick@yopmail.com',
//            'name' => 'Contact',
//        ];

        $to = [
            'email' => $event->getEmail(),
            'name' => explode('@', $event->getEmail())[0],
        ];

        $subject = $event->getSubject();

        $data=[
            'name' => $event->getName(),
            'email' => $event->getEmail(),
            'subject' => $event->getSubject(),
            'message' => $event->getMessage(),
            ];

        $this->mailerService->sendContactEmail(
            $to['email'],
            $subject,
//            $from,
            $data

//            'contact/contact_email.html.twig',
//
//            [
//
//                'message' => $event->getMessage(),
//
//                'subject' => $event->getSubject(),
//
//                'name' => $event->getName(),
//
//                'email' => $event->getEmail()
//
//            ]

        );
    }
}