<?php

declare(strict_types=1);

namespace App\UI\Service;

use Symfony\Component\HttpFoundation\RequestStack;

readonly class FlashService
{
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