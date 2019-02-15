<?php

/**
 * Singleton Pattern.
 * 
 * Modern implementation.
 */
class Singleton
{
    /**
     * Call this method to get singleton
     */
    public static function i()
    {
      static $instance = false;
      if( $instance === false )
      {
        // Late static binding (PHP 5.3+)
        $instance = new static();
      }

      return $instance;
    }

    /**
     * Make constructor private, so nobody can call "new Class".
     */
    private function __construct() {}

    /**
     * Make clone magic method private, so nobody can clone instance.
     */
    private function __clone() {}

    /**
     * Make sleep magic method private, so nobody can serialize instance.
     */
    private function __sleep() {}

    /**
     * Make wakeup magic method private, so nobody can unserialize instance.
     */
    private function __wakeup() {}

}
/**
 * Database.
 *
 * Inherited from Singleton, so it's now got singleton behavior.
 */
class DB extends Singleton {

  protected $label;

  /**
   * Example of that singleton is working correctly.
   */
  public function setLabel($label)
  {
    $this->label = $label;
  }

  public function getLabel()
  {
    return $this->label;
  }

}

// create first instance
DB::i()->setLabel('Abraham');
echo DB::i()->getLabel() . PHP_EOL;

// now try to create other instance as well
echo DB::i()->getLabel() . PHP_EOL; // Abraham

    class Car
    {
        public static function run()
        {
            return static::getName();
        }

        private static function getName()
        {
            return 'Car';
        }
    }

    class Toyota extends Car
    {
        public static function getName()
        {
            return 'Toyota';
        }
    }

    echo Car::run(); // Output: Car
    echo Toyota::run(); // Output: Toyota
?>