<?php

namespace App\Exceptions;

use Exception;

class NoDataException extends Exception
{
    public function render($request)
    {       
        return response()->json([
            "error"     => "NoDateException",
            "message"   => $this->getMessage()
        ]);       
    }
}
