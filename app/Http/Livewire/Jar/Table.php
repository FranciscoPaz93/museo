<?php

namespace App\Http\Livewire\Jar;

use App\Models\CollectionIteration;
use Livewire\Component;

class Table extends Component
{
    public $collectionIteration;
    public $jars;

    public function mount(CollectionIteration $collectionIteration)
    {
        $this->collectionIteration = $collectionIteration;
    }
    public function render()
    {
        $this->jars = $this->collectionIteration->jars;
        return view('livewire.jar.table');
    }
}
