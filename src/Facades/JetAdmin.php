<?php

namespace IvanAquino\JetAdmin\Facades;

use Illuminate\Support\Facades\Facade;

/**
 * @see \IvanAquino\JetAdmin\JetAdmin
 */
class JetAdmin extends Facade
{
    protected static function getFacadeAccessor()
    {
        return \IvanAquino\JetAdmin\JetAdmin::class;
    }
}
