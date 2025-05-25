<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class NoteController extends Controller
{
    public function show()
    {
        return view('note');
    }
}