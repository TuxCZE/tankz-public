<?php

class Router
{

    /**
     * Array which contains urls with respective controller name. i.e: {'game' => 'GameController'}
     * @var urls
     */
    protected $urls;

    /**
     * Contains actual controller
     * @var controller
     */
    protected $controller;

    /**
     * Contains actual action
     * @var urls
     */
    protected $action = null;

    /**
     * Contains array of parameters
     * @var urls
     */
    protected $parameters = null;

    /**
     * @return mixed
     */
    public function getUrls()
    {
        return $this->urls;
    }

    /**
     * @return mixed
     */
    public function getController()
    {
        return $this->controller;
    }

    /**
     * @return mixed
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @return string
     */
    public function getParameters()
    {
        return $this->parameters;
    }


    /**
     * Router constructor.
     */
    public function __construct()
    {
        $this->urls[''] = 'HomeController';
        $this->urls['game'] = 'GameController';

        $address = explode('/', $_SERVER['REQUEST_URI']);

        if ($address[1] === '') {
            $this->controller = null;
        } else {
            $this->controller = $address[1];
        }

        if (!empty($address[2]))
        {
            $this->action = $address[2];
        }

        if (isset($address[3]))
        {
            $this->parameters = implode('/', array_slice($address, 3));
        }

    }


    /**
     * Return name of actual controller class.
     *
     * @return string
     * @throws Exception when actual route is not registred.
     */
    public function getControllerClass()
    {

        if (isset($this->urls[$this->getController()])) {
            return $this->urls[$this->getController()];
        }

        throw new Exception('Route ' . $this->getController() . ' not found!');
    }


}
