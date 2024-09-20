<?php

declare(strict_types=1);

namespace App\UI\Responder;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;

/**
 * Class RedirectResponder
 */
class RedirectResponder
{
    /**
     * RedirectResponder constructor.
     *
     * @param UrlGeneratorInterface $urlGenerator
     */
    public function __construct(
        protected UrlGeneratorInterface $urlGenerator
    ) {
    }

    /**
     * Undocumented function
     *
     * @param string $routeName
     * @param array  $paramsRoute
     *
     * @return RedirectResponse
     */
    /*public function redirectToRoute(
        string $routeName,
        array $paramsRoute = []
    ): RedirectResponse
    {
        return new RedirectResponse(
            $this->urlGenerator->generate($routeName, $paramsRoute)
        );
    }*/

    /**
     * @param string $routeName
     * @param array $paramsRoute
     *
     * @return RedirectResponse
     */
    public function redirectToRoute(
        string $routeName,
        array $paramsRoute = []
    ): RedirectResponse
    {
        // Nettoyer les paramètres de route pour éviter l'inclusion de données sensibles
        $cleanParams = array_filter($paramsRoute, function ($param) {
            return !is_null($param) && $param !== '';
        });

        return new RedirectResponse(
            $this->urlGenerator->generate($routeName, $cleanParams)
        );
    }
}
