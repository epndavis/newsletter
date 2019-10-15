<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Email;

class HomeController extends Controller
{
    public function index()
    {
        return view('newsletter.register', [
            'emails' => Email::all(),
        ]);
    }
}
