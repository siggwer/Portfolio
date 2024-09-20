<?php

declare(strict_types=1);

namespace App\Domain\Dto;

use Symfony\Component\Validator\Constraints as Assert;

/**
 *
 */
class ContactDto
{
    /**
     * @var string|null
     */
    #[Assert\NotBlank(message: 'name.required')]
    private ?string $name = null;

    /**
     * @var string|null
     */
    #[Assert\NotBlank(message: 'email.required')]
    #[Assert\Email(message: 'email.format_invalid')]
    private ?string $email = null;

    /**
     * @var string|null
     */
    #[Assert\NotBlank(message: 'subject.required')]
    private ?string $subject = null;

    /**
     * @var string|null
     */
    #[Assert\NotBlank(message: 'message.required')]
    private ?string $message = null;

    // Getters

    /**
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @return string|null
     */
    public function getSubject(): ?string
    {
        return $this->subject;
    }

    /**
     * @return string|null
     */
    public function getMessage(): ?string
    {
        return $this->message;
    }

    // Setters

    /**
     * @param string|null $name
     *
     * @return void
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string|null $email
     *
     * @return void
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @param string|null $subject
     *
     * @return void
     */
    public function setSubject(?string $subject): void
    {
        $this->subject = $subject;
    }

    /**
     * @param string|null $message
     *
     * @return void
     */
    public function setMessage(?string $message): void
    {
        $this->message = $message;
    }
}
