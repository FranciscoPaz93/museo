<?php

namespace App\Http\Controllers;

use App\Models\CollectionIteration;
use App\Models\Collection;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CollectionIterationController extends Controller
{
    public function show(CollectionIteration $collectionIteration)
    {
        return view('collection-iterations.show', compact('collectionIteration'));
    }

    public function create(Request $request)
    {
        $collectionId = $request->input('collection_id');
        $collection = Collection::find($collectionId);
        if (Session::has('collectionIterationId')) {
            $collectionForCollectionIteration = CollectionIteration::find(Session::get('collectionIterationId'))->collection;
            if ($collectionForCollectionIteration->id != $collection->id) {
                Session::forget('collectionIterationId');
            }
        }

        return view('collection-iterations.create', compact('collection'));
    }
}
