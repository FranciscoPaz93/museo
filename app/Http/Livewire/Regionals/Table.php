<?php

namespace App\Http\Livewire\Regionals;

use Livewire\Component;
use App\Models\Regional;

class Table extends Component
{
    public function render()
    {
        $regionals = Regional::paginate(10);
        return view('livewire.regionals.table', compact('regionals'));
    }
}
