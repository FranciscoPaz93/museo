<?php

namespace App\Http\Livewire\Regionals;

use App\Models\Regional;
use Livewire\Component;

class EditModal extends Component
{
    public $showModal = false;
    public $regional;
    public $name;
    public $identity;

    public function mount(Regional $regional)
    {
        $this->regional = $regional;
        $this->name = $regional->name;
        $this->identity = $regional->identity;
    }

    public function render()
    {
        return view('livewire.regionals.edit-modal');
    }

    public function updateRegional()
    {
        $this->validate([
            'name' => 'required',
            'identity' => 'required',
        ]);

        $this->regional->update([
            'name' => $this->name,
            'identity' => $this->identity,
        ]);

        $this->regional->save();
        return redirect()->route('regionals.show', $this->regional->id);
    }
}
