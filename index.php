<?php 
include "app/app.php";

$app = new GameApp('{
    "board_height": 20,
    "board_width": 10,
    "objects": {
        "obj1": {
            "x": 5,
            "y": 5,
        },
        "obj2": {
            "x": 7,
            "y": 5,
        },
        "obj3": {
            "x": 5,
            "y": 5,
            "icon": "car",
            "color": "red",
        },
    }
}');

$app->render();