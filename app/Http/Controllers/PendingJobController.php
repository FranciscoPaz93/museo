<?php

namespace App\Http\Controllers;

use App\Models\PendingJob;
use Illuminate\Http\Request;
use App\Models\CollectionIteration;
use Illuminate\Support\Facades\Session;

class PendingJobController extends Controller
{
    public function sentToCollectionIteration(PendingJob $pendingJob)
    {
        $collectionIteration = CollectionIteration::find($pendingJob->model_id);
        $collection = $collectionIteration->collection;
        Session::put('collectionIterationId', $collectionIteration->id);
        Session::put('pendingJobId', $pendingJob->id);
        return redirect()->route('collection-iterations.create', ['collection_id' => $collection->id]);
    }
}
