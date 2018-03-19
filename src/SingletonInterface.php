<?php

namespace elementary\core\Singleton;

interface SingletonInterface
{
    /**
     * @return static
     */
    public static function me();
}