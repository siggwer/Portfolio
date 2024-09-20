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
     *
     * @Assert\NotBlank(
     *     message="name.required"
     * )
     */
    protected ?string $name = "";

    /**
     * @var string|null
     *
     * @Assert\NotBlank(
     *     message="email.required"
     * )
     * @Assert\Email(
     *     message="email.format_invalid"
     * )
     */
    protected ?string $email = "";

    /**
     * @var string|null
     *
     * @Assert\NotBlank(
     *     message="subject.required"
     * )
     */
    protected ?string $subject = "";

    /**
     * @var string|null
     *
     * @Assert\NotBlank(
     *     message="message.required"
     * )
     */
    protected ?string $message = "";

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
}
