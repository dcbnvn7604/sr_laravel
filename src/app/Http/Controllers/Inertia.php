<?php

namespace App\Http\Controllers;

use Inertia\Inertia as _Inertia;
use Illuminate\Routing\Controller;

class Inertia extends Controller
{
    public function index()
    {
        return _Inertia::render('Inertia');
    }
}
