<?php

namespace App\Http\Controllers;

use App\Models\CollectionIteration;
use Illuminate\Http\Request;

class CollectionIterationController extends Controller
{
    public function show(CollectionIteration $collectionIteration)
    {
        return view('collection-iterations.show', compact('collectionIteration'));
    }
}
