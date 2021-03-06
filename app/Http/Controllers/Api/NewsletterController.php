<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StoreNewsletter;
use App\Models\Email;

class NewsletterController
{
    public function register(StoreNewsletter $request)
    {
        $email = new Email();

        $email->email = $request->input('email');
        $email->first_name = $request->input('first_name');
        $email->last_name = $request->input('last_name');

        $email->save();

        return response()->json([
            'success' => true,
        ]);
    }
}
