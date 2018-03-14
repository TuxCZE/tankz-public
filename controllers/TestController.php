<?php

class TestController extends Controller
{
    protected function defaultAction($parameters)
    {
        new GameTest();
        $this->template = 'blank.html';

    }

}
