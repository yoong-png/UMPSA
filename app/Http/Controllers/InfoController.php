<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class InfoController extends Controller
{
    public function show()
    {
        return view('info');
    }
}