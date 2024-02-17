<?php

namespace App\Controller;

use Psr\Container\ContainerInterface;

class Controller {
    protected $container;

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
    public function render(string $template, array $data = []) {
        return $this->container->get('twig')->render($template, $data);
    }
}