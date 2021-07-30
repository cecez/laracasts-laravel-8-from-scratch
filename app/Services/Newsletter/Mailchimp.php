<?php

namespace App\Services\Newsletter;

use App\Contracts\Newsletter;
use MailchimpMarketing\ApiClient;

class Mailchimp implements Newsletter
{
    public function __construct(protected ApiClient $client) {}

    public function subscribe(string $email, string $listId = null)
    {
        $listId ??= config('services.mailchimp.lists.subscribers');

        return $this->client->lists->addListMember($listId, [
            'email_address' => $email,
            'status' => 'pending'   // it will generate a double opt-in confirmation (e-mail)
        ]);
    }
}
