<?php
require_once 'Renderer.php';
require_once 'GameObject.php';
require_once 'Game.php';

class GameApp
{
    private $game;
    private $renderer;

    public function __construct()
    {
        IW::do()->say("constructing...");
        $this->game = new Game();
        $this->readInitialConfig();
    }

    public function readInitialConfig()
    {
        $config_json = file_get_contents("config.json");
        IW::do()->say($config_json);
        try {
            $args = $this->readParameters($config_json);

        } catch (\Throwable $th) {
            IW::do()->say("Error parsing config file");
        }

        IW::do()->say("config array:<br/>");

        if(isset($args))
            IW::do()->say($args);

        IW::do()->say("initialized!!");
    }

    private function readParameters($config_json)
    {
        $args = $this->parseJson($config_json);

        IW::do()->say($args);
        var_dump($args);
        $this->game->board_height = $args->board_height;
        $this->game->board_width = $args->board_width;

        IW::do()->say($args->objects);
        if( isset($args->objects) )
        foreach ($args->objects as $object)
        {
            IW::do()->say($object);

            $this->game->addObject($this->parseObject($object));
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

    public function render()
    {
        $this->renderer = new Renderer($this->game);
    }
}