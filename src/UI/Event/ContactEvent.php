<?php

namespace App\UI\Event;

use Symfony\Contracts\EventDispatcher\Event;

class ContactEvent extends Event
{
    public const NAME = 'contact.event';

    /**
     * @var string
     */
    private string $name;

    /**
     * @var string
     */
    private string $email;

    /**
     * @var string
     */
    private string $subject;

    /**
     * @var string
     */
    private string $message;

    /**
     * ContactEvent constructor.
     *
     * @param string $name
     * @param string $email
     * @param string $subject
     * @param string $message
     */
    public function __construct(
        string $name,
        string $email,
        string $subject,
        string $message,
    ) {
        $this->name = $name;
        $this->email = $email;
        $this->subject = $subject;
        $this->message = $message;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @return string
     */
    public function getSubject(): string
    {
        return $this->subject;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return $this->message;
    }
}