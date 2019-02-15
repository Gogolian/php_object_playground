<?php
require_once 'Renderer.php';
require_once 'GameObject.php';

class GameApp
{
    public $board_width;
    public $board_height;
    public $cell_size = '40px';
    public $objects;

    private $renderer;

    function __construct($config_json)
    {
        try {
            $args = $this->readParameters($config_json);

        } catch (\Throwable $th) {
            echo "Bad config file";
        }

        echo "config array:<br/>";
        print_r($args);
        echo "<br/><br/>initialized!!<br/><br/>";
    }

    public function render()
    {
        $this->renderer = new Renderer($this);
    }

    private function readParameters($config_json)
    {
        $args = $this->parseJson($config_json);

        $this->board_height = $args->board_height;
        $this->board_width = $args->board_width;

        if(isset($args->objects))
            foreach ($args->objects as $object)
            {
                $this->addObject($this->parseObject($object));
            }

        return $args;
    }

    private function parseJson($json)
    {
        return json_decode(preg_replace('/,\s*}/', '}', $json));
    }

    private function parseObject($object)
    {
        $game_object = new GameObject;

        if(isset($object->x))
        $game_object->x = $object->x;

        if(isset($object->y))
            $game_object->y = $object->y;

        if(isset($object->icon))
            $game_object->icon = $object->icon;

        if(isset($object->color))
            $game_object->color = $object->color;

        return $game_object;

    }
    private function addObject(GameObject $object)
    {
        $this->objects[] = $object;
    }
}