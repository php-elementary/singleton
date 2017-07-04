<?php

namespace elementary\core\Singleton;


trait SingletonTrait
{
    /**
     * @var static
     */
    protected static $instance = null;

    /**
     * @return static
     */
    public static function me()
    {
        if (static::$instance === null) {
            static::$instance = new static();
        }

        return static::$instance;
    }

}