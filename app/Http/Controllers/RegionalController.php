<?php

namespace App\Http\Controllers;

use App\Models\Regional;
use Illuminate\Http\Request;

class RegionalController extends Controller
{
    public function index()
    {
        return view('regionals.index');
    }

    public function show(Regional $regional)
    {
        return view('regionals.show', compact('regional'));
    }
}
