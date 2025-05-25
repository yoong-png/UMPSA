<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class StudySpaceController extends Controller
{
    public function show()
    {
        return view('study space');
    }
}

