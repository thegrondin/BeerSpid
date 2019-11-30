<?php
namespace Website\Libs\BeerSpid\Views;


use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Loader\LoaderInterface;
use Website\Libs\BeerSpid\DependencyInjection\DIContainer;
use Website\Libs\BeerSpid\Views\Contracts\IView;
use Website\Libs\BeerSpid\Views\Contracts\IViewRenderer;

class ViewRenderer implements IViewRenderer
{

    private $view;
    private $fileSystemLoader;
    private $container;
    private $twig;
    function __construct(DIContainer $container)
    {
        $this->container = $container;
    }

    public function render(array $parameters) {
        $this->fileSystemLoader = (object) $this->container->getInstance(LoaderInterface::class, [$this->view->getPath()]);
        $this->twig = (object) $this->container->getInstance(Environment::class, [['debug' => true]]);

        echo $this->twig->render($this->view->getName(), $parameters);
    }

    public function addView(IView $view)
    {
        $this->view = $view;
    }
}