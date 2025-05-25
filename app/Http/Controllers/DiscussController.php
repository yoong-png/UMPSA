<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DiscussController extends Controller
{
    public function show()
    {
        return view('discussion');
    }
}