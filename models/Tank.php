<?php
/**
 * Created by PhpStorm.
 * User: refuse
 * Date: 2/1/18
 * Time: 6:37 PM
 */

class Tank
{
    /**
     * @var Player
     */
    protected $player;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var integer
     */
    protected $range;
    /**
     * @var integer
     */
    protected $armor;
    /**
     * @var integer
     */
    protected $speed;
    /**
     * @var integer
     */
    protected $power;
    /**
     * @var integer
     */
    protected $fireRange;
    /**
     * @var integer
     */
    protected $position_x;
    /**
     * @var integer
     */
    protected $position_y;


    /**
     * Return true, if given coordinates are in range of tank. False otherwise.
     * @param $x - Coordinate on X axis
     * @param $y - Coordinate on Y axis
     * @return bool - True if coordinates are in range.
     */
    public function inRange($x, $y)
    {
        return false;

    }


    /**
     * Return true, if given coordinates are in fire range of tank. False otherwise.
     * @param $x - Coordinate on X axis
     * @param $y - Coordinate on Y axis
     * @return bool - True if coordinates are in fire range.
     */
    public function inFireRange($x, $y)
    {
        return false;
    }


}
