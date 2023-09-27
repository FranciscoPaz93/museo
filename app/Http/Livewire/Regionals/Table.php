<?php

namespace App\Http\Livewire\Regionals;

use Livewire\Component;
use App\Models\Regional;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    public function render()
    {
        $regionals = Regional::paginate(10);
        return view('livewire.regionals.table', compact('regionals'));
    }
}
