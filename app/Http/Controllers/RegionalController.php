<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegionalController extends Controller
{
    public function index()
    {
        return view('regionals.index');
    }
}
