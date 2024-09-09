<?php

namespace App\Facades;

use Illuminate\Support\Facades\Facade;

class KlarnaPayment extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'klarna.payment';
    }
}