<?php
/**
 * Created by PhpStorm.
 * User: Philippe.BAUMANN
 * Date: 04/12/2018
 * Time: 08:31
 */

namespace App\Classes;


class Thing
{
    private $id;

    private $name;
    private $nbBricks;
    private $color;

    /**
     * Thing constructor.
     * @param $id
     * @param $name
     * @param $nbBricks
     * @param $color
     */
    public function __construct($id, $name, $nbBricks, $color)
    {
        $this->id = $id;
        $this->name = $name;
        $this->nbBricks = $nbBricks;
        $this->color = $color;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNbBricks()
    {
        return $this->nbBricks;
    }

    /**
     * @param mixed $nbBricks
     */
    public function setNbBricks($nbBricks): void
    {
        $this->nbBricks = $nbBricks;
    }

    /**
     * @return mixed
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * @param mixed $color
     */
    public function setColor($color): void
    {
        $this->color = $color;
    }
}