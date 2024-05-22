<?php

namespace App\Http\Livewire\Regionals;

use App\Models\Regional;
use Livewire\Component;

class CreateModal extends Component
{
    public $showModal = false;
    public $name;
    public $identity;

    public function render()
    {
        return view('livewire.regionals.create-modal');
    }

    public function createRegional()
    {
        $this->validate([
            'name' => 'required',
            'identity' => 'required',
        ]);

        $regional = Regional::create([
            'name' => $this->name,
            'uuid' => (string) \Illuminate\Support\Str::uuid(),
            'identity' => $this->identity,
        ]);

        $regional->save();
        return redirect()->route('regionals.show', $regional->id);
    }
}
