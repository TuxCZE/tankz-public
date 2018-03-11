<?php

class Game
{
    const MAP_DIMENSION_X = 30;
    const MAP_DIMENSION_Y = 16;

    const ACTION_POINTS = 10;

    /**
     * @var Tank[]
     */
    protected $tanks;

    /**
     * @var Player[]
     */
    protected $players;

    /**
     * @return Game
     */
    static function getGameInstance(){
        return new Game();
    }




}
