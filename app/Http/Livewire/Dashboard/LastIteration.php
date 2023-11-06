<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;
use App\Models\CollectionIteration;

class LastIteration extends Component
{
    public function render()
    {
        $lastIterations = CollectionIteration::searchYear(date('Y'))->searchMonth(date('m'))->get();
        return view('livewire.dashboard.last-iteration', compact('lastIterations'));
    }
}
