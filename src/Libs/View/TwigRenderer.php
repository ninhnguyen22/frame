<?php

namespace Nin\Libs\View;

class TwigRenderer implements Renderer
{
    public function render(string $templatePath, array $arguments = []): string
    {
        $loader = new \Twig\Loader\FilesystemLoader('/../src/Libs/Views');
        $twig = new \Twig\Environment($loader, [
            'cache' => '/../cache',
        ]);

        return $twig->render($templatePath, $arguments);
    }
}
