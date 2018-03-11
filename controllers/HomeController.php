<?php

class HomeController extends Controller
{
    /**
     * Defalult controller. Redirects to /game.
     * @param $parameters
     */
    protected function defaultAction($parameters)
    {
        return $this->redirect('/game');
    }

}
