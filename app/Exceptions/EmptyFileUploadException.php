<?php

namespace App\Exceptions;

use Exception;

class EmptyFileUploadException extends Exception
{
    public function render($request)
    {
        return redirect("/create");
    }
}
