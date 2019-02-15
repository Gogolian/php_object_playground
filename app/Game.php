<?php

class Game
{
    private $board_width;
    private $board_height;
    private $cell_size = '40px';
    private $objects;
    
    public function __constructor(Type $var = null)
    {
        echo "Hello!";
    }
    
    public function addObject(GameObject $object)
    {
        $this->objects[] = $object;
    }

    public function boardWidth()
    {
        return $this->board_width;
    }

    public function boardHeight()
    {
        return $this->board_height;
    }

    public function cellSize()
    {
        return $this->cell_size;
    }

    public function getObjects()
    {
        return $this->objects;
    }
}