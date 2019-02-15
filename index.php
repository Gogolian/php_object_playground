<?php 
include "app/app.php";
include "app/Addons/InfoWindow.php";

try {
    IW::do()->say('starting...');
    $app = new GameApp();
    //$app->render();
} finally {
    IW::do()->render();
}