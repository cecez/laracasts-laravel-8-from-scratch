<?php

namespace App\Services\Newsletter;

use App\Contracts\Newsletter;

class ConvertKit implements Newsletter
{

    public function subscribe(string $email, string $listId = null)
    {
        // TODO: Implement subscribe() method.
    }
}
