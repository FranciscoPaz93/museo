<?php

namespace App\Http\Livewire\Dashboard;

use Livewire\Component;

class Stats extends Component
{
    public function render()
    {
        $stats = [
            'regionals' => \App\Models\Regional::count(),
            'collections' => \App\Models\Collection::count(),
            'bugs' => \App\Models\Bug::count(),
            'users' => \App\Models\User::count(),
        ];
        return view('livewire.dashboard.stats', compact('stats'));
    }
}
