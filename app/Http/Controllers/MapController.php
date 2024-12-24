<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class MapController extends Controller
{
    public function __invoke()
    {
        return Inertia::render('Map');
    }
}
