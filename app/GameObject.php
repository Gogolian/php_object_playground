<?php

class GameObject{

    public $x;
    public $y;
    public $icon;
    public $color;

    function __construct(){
        $this->x = 0;
        $this->y = 0;
        $this->icon = 'circle-o';
        $this->color = 'grey';
    }
}