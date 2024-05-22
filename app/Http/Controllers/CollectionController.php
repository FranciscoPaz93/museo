<?php

namespace App\Http\Controllers;

use App\Exports\CollectionsExport;
use App\Models\Collection;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

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

    public function create(Request $request)
    {
        $regional = \App\Models\Regional::find($request->regional_id);
        return view('collections.create')->with('regional', $regional);
    }

    public function export()
    {
        return Excel::download(new CollectionsExport, 'users.xlsx');
    }
}
