<?php

namespace App\Http\Livewire\Collections;

use App\Models\Collection;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;
    public $sortField = 'id';
    public $sortAsc = true;
    public $search = '';
    public function render()
    {
        $collections = Collection::sortBy($this->sortField, $this->sortAsc)->search($this->search)->paginate(15);
        return view('livewire.collections.table', compact('collections'));
    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }
        $this->sortField = $field;
    }

    public function updatedSearch()
    {
        $this->resetPage();
    }
}
