<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\CollectionIteration;

class LastIteration extends Component
{
    public function render()
    {
        $lastIterations = CollectionIteration::searchYear(request('year'))->searchMonth(request('month'))->get();
        return view('livewire.dashboard.last-iteration', compact('lastIterations'));
    }
}
