<?php

namespace App\Http\Livewire\Collections;

use Livewire\Component;
use App\Models\Collection;
use App\Models\CollectionIteration;

class TableCollectionIteration extends Component
{
    public $collection;
    public $year = '';
    public $filterYear = '';

    public function mount(Collection $collection)
    {
        $this->collection = $collection;
    }

    public function render()
    {

        $this->filterYear = CollectionIteration::yearsForFilter($this->collection->id);
        $collectionIterations = $this->collection->collectionIterations()->searchYear($this->year)->paginate(10);
        return view('livewire.collections.table-collection-iteration', compact('collectionIterations'));
    }

    public function setYear($year)
    {
        $this->year = $year;
    }
}
