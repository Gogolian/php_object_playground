<?php

class Singleton
{
    public static function do()
    {
      static $instance = false;
      if( $instance === false )
      {
        // Late static binding (PHP 5.3+)
        $instance = new static();
      }
      return $instance;
    }

    private function __construct() {}
    private function __clone() {}
    private function __sleep() {}
    private function __wakeup() {}

}

class IW extends Singleton {
    private $messages;

    public function say($message = '')
    {
        $date = date("Y-m-d H:i:s");
        if( !is_array($message) && !is_object($message) )
        {
            $this->messages[] = '('.$date.') '.$message.'<br/>';
        }
        else
        {
            $this->messages[] = '('.$date.') '.json_encode($message).'<br/>';
        }
        
    }

    public function render()
    {
        echo '<div id="message-window">';
        foreach($this->messages as $message)
        {
            echo $message;
        }
        echo '</div>';
    }

}