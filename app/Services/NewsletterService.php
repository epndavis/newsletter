<?php

namespace App\Services;

use App\Models\Email;

class NewsletterService
{
    /**
     * @param string $email
     */
    public function emailSubscribed($email)
    {
        return Email::where('email', $email)->exists();
    }

    /**
     *  Send the newsletter
     */
    public function send()
    {
        $emails = Email::where('subscribed', true)->get();
    }
}
