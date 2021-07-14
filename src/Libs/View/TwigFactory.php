<?php

namespace Nin\Libs\View;

use Twig\Loader\FilesystemLoader;
use Twig\Environment;

/**
 * Class View TwigFactory
 * @package Nin\Libs\View
 */
class TwigFactory implements ViewFactory
{
    /**
     * @var ViewConfigContract
     */
    protected ViewConfigContract $config;

    protected $templateFactory;

    /**
     * TwigFactory constructor.
     * @param ViewConfigContract $config
     */
    public function __construct(ViewConfigContract $config)
    {
        $this->config = $config;
        $this->templateFactory = $this->getTemplateFactory();
    }

    /**
     * Twig render template.
     *
     * @param string $viewPath
     * @param array $parameters
     * @return string
     * @throws \Twig\Error\LoaderError
     * @throws \Twig\Error\RuntimeError
     * @throws \Twig\Error\SyntaxError
     */
    public function make(string $viewPath, $parameters = [])
    {
        $viewPath = $viewPath . ".html.twig";
        return $this->templateFactory->render($viewPath, $parameters);
    }

    /**
     * Get twig template
     *
     * @return Environment
     */
    public function getTemplateFactory()
    {
        $loader = $this->getLoader();
        return new Environment($loader, [
//            'cache' => $this->config->getCachePath(),
        ]);
    }

    /**
     * Get directory loader.
     *
     * @return FilesystemLoader
     */
    public function getLoader(): FilesystemLoader
    {
        return new FilesystemLoader($this->config->getDirLoader());
    }
}
