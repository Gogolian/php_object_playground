<?php

class Renderer
{
    private $game;
    private $objects_on_board;

    function __construct($game)
    {
        $this->game = $game;

        $this->renderHead();

        $this->renderCSS();

        $this->prepareObjects();

        $this->renderBoard();

        $this->renderFoot();
    }

    private function prepareObjects()
    {
        if( isset($this->game->objects) )
        foreach ($this->game->objects as $key => $object)
        {
            $this->objects_on_board[$object->x][$object->y][] = $key;
        }
    }

    private function renderBoard(){
        echo '<div id="board">';
        for ($y = 0; $y < $this->game->board_width; $y++) {
            echo '<div class="row row-' . $y . '">';
            for ($x = 0; $x < $this->game->board_height; $x++) {
                echo '<div class="col col-' . $x . '" ><div class="cell cell-' . $x . '-' . $y . '">';
                $this->renderObjects($x, $y);
                echo '</div></div>';
            }
            echo '</div>';
        }
        echo '</div>';
    }

    private function renderObjects($x, $y)
    {
        if(isset($this->objects_on_board[$x][$y]))
        foreach($this->objects_on_board[$x][$y] as $object_key)
        {
            $icon = $this->game->objects[$object_key]->icon;
            $style = 'color: '.$this->game->objects[$object_key]->color;
            echo '<div class="object"><i style="'.$style.'" class="fa fa-'.$icon.'"></i></div>';
        }
    }

    private function renderCSS()
    {
        ?>
        <style>
            #board,
            #board .col {
                display: inline-block;
            }

            #board {
                border: 2px solid #a6bfd6;
            }

            #board .cell {
                width: <?php echo $this->game->cell_size; ?>;
                height: <?php echo $this->game->cell_size; ?>;
                border: 1px solid #a6bfd6;
            }

            #board .object {
                position: absolute;
                width: <?php echo $this->game->cell_size; ?>;
                height: <?php echo $this->game->cell_size; ?>;
                text-align: center;
            }
            #board .object i{
                font-size: <?php echo $this->game->cell_size; ?>;
            }
        </style>
        <?php
    }

    private function renderHead()
    {
        ?>
        <!DOCTYPE html>
        <html lang="en-US">
        <head>
            <title>Tryit Editor v3.6</title>
            <meta name="viewport" content="width=device-width">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
        </head>
        <body>
        <?php
    }

    private function renderFoot()
    {
        ?>
        </body>
        </html>
        <?php
    }

}