<?php

declare(strict_types=1);

namespace App\UI\Responder;

use Symfony\Component\HttpFoundation\Response;
use Twig\Error\RuntimeError;
use Twig\Error\LoaderError;
use Twig\Error\SyntaxError;
use Twig\Environment;

/**
 * Class ViewResponder
 *
 * @package App\UI\Responder
 */
class ViewResponder
{
    /**
     * @var Environment
     */
    protected $twig;

    /**
     * ViewResponder constructor.
     *
     * @param Environment $twig
     */
    public function __construct(Environment $twig)
    {
        $this->twig = $twig;
    }

    /**
     * @param string $template
     * @param array  $params
     *
     * @return Response
     *
     * @throws LoaderError
     * @throws RuntimeError
     * @throws SyntaxError
     */
    public function __invoke(string $template, array $params = []): Response
    {
        return new Response(
            $this->twig->render($template, $params)
        );
    }
}
