<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Newsletter
{
    public function subscribe(string $email, string $listId = null)
    {
        $listId ??= config('services.mailchimp.lists.subscribers');

        return $this->client()->lists->addListMember($listId, [
            'email_address' => $email,
            'status' => 'pending'   // it will generate a double opt-in confirmation (e-mail)
        ]);
    }

    protected function client(): ApiClient
    {
        return (new ApiClient())->setConfig([
            'apiKey' => config('services.mailchimp.key'),
            'server' => 'us20'
        ]);
    }
}
