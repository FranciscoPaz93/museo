<?php

namespace App\Http\Controllers;

use App\Models\Collection;
use Illuminate\Http\Request;

class CollectionController extends Controller
{
    public function index()
    {
        return view('collections.index');
    }
    public function show(Collection $collection)
    {
        return view('collections.show', compact('collection'));
    }
}
