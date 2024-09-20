<?php

declare(strict_types=1);

namespace App\UI\Service;

use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\Mailer;

readonly class MailerService
{
    /**
     * @var Mailer
     */
    private Mailer $mailer;

    /**
     * @var array
     */
    protected array $paramsMailApp;

    /**
     * @param Mailer $mailer
     * @param array $paramsMailApp
     */
    public function __construct(MailerInterface $mailer, array $paramsMailApp)
    {
        $this->mailer = $mailer;
        $this->paramsMailApp = $paramsMailApp;
    }

    /**
     * @param string $to
     * @param string $subject
     * @param array $data
     *
     * @return void
     *
     * @throws TransportExceptionInterface
     */
    public function sendContactEmail(string $to, string $subject,array $data): void
    {

        // Crée l'email
        $email = (new TemplatedEmail())
            ->from($this->paramsMailApp['email'])
            ->to($to)
            ->subject($subject)
            ->htmlTemplate('mail/email.html.twig')
            ->context(['data' => $data]);
        // Envoie l'email
        $this->mailer->send($email);
    }
}