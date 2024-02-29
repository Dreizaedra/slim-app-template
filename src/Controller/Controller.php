<?php

namespace App\Controller;

use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

abstract class Controller {
    protected ContainerInterface $container;

    /**
     * Constructor for the class.
     *
     * @param ContainerInterface $container
     */
    public function __construct(ContainerInterface $container) {
        $this->container = $container;
    }

    /**
     * Render the given template with the provided data.
     *
     * @param string $template The path to the template file
     * @param array $data The data to be passed to the template
     * @return string The rendered template
     */
    protected function render(string $template, array $data = []): string {
        try {
            return $this->container->get('twig')->render($template, $data);
        } catch (NotFoundExceptionInterface $e) {
            exit('Container not found : ' . $e->getMessage());
        } catch (ContainerExceptionInterface $e) {
            exit('Container Exception : ' . $e->getMessage());
        }
    }

    abstract public function index(Request $request, Response $response): Response;
}