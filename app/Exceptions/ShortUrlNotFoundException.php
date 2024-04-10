<?php

namespace App\Exceptions;

use Exception;

class ShortUrlNotFoundException extends Exception
{
    public function render($request)
    {
        return response()->view('errors.404', [], 404);
    }
}
