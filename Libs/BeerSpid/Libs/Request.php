<?php

namespace Website\Libs\BeerSpid\Libs;

use Website\Libs\BeerSpid\Request\Contracts\Bags\IBag;
use Website\Libs\BeerSpid\Request\Contracts\IParametersCollection;
use Website\Libs\BeerSpid\Request\Contracts\IRequest;
use Website\Libs\BeerSpid\Router\Contracts\IRoute;

class Request implements IRequest {

    protected $route;
    protected $method;
    protected $parameters;
    protected $cookies;
    protected $files;
    protected $server;
    protected $content;

    function __construct()
    {
    }


    public static function getType() {
        return $_SERVER['REQUEST_METHOD'];
    }

    public function handleDispatch()
    {
		dump($this);

    }


    /**
     * @return IRoute
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * @param mixed $route
     * @return Request
     */
    public function setRoute(IRoute $route)
    {
        $this->route = $route;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $method
     * @return Request
     */
    public function setMethod(string $method)
    {
        $this->method = $method;
        return $this;
    }

    /**
     * @return IParametersCollection
     */
    public function getParameters()
    {
        return $this->parameters;
    }

    /**
     * @param IParametersCollection $parameters
     * @return Request
     */
    public function setParameters(IParametersCollection $parameters)
    {
        $this->parameters = $parameters;
        return $this;
    }

    /**
     * @return IBag
     */
    public function getCookies()
    {
        return $this->cookies;
    }

    /**
     * @param IBag $cookies
     * @return Request
     */
    public function setCookies(IBag $cookies)
    {
        $this->cookies = $cookies;
        return $this;
    }

    /**
     * @return IBag
     */
    public function getFiles()
    {
        return $this->files;
    }

    /**
     * @param IBag $files
     * @return Request
     */
    public function setFiles(IBag $files)
    {
        $this->files = $files;
        return $this;
    }

    /**
     * @return IBag
     */
    public function getServer()
    {
        return $this->server;
    }

    /**
     * @param IBag $server
     * @return Request
     */
    public function setServer(IBag $server)
    {
        $this->server = $server;
        return $this;
    }

    /**
     * @return string
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param string $content
     * @return Request
     */
    public function setContent(string $content)
    {
        $this->content = $content;
        return $this;
    }

}