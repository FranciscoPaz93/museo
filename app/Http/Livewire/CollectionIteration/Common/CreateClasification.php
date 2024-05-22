<?php

namespace App\Http\Livewire\CollectionIteration\Common;

use App\Models\Family;
use App\Models\Gender;
use App\Models\Genitalia;
use App\Models\Order;
use App\Models\Species;
use App\Models\Subfamily;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class CreateClasification extends Component
{
    public $showModal = false;
    public $orders = [];
    public $families = [];
    public $subfamilies = [];
    public $genus = [];
    public $species = [];
    public $genitalia = [];

    public $order;
    public $family;
    public $subfamily;
    public $gender;
    public $speci;
    public $genitalium;

    public function mount()
    {
        $this->orders = \App\Models\Order::all();
        $this->families = \App\Models\Family::all();
        $this->subfamilies = \App\Models\Subfamily::all();
        $this->genus = \App\Models\Gender::all();
        $this->species = \App\Models\Species::all();
        $this->genitalia = \App\Models\Genitalia::all();
    }


    public function render()
    {
        return view('livewire.collection-iteration.common.create-clasification');
    }

    public function updatingShowModal()
    {
        $this->reset();
    }

    public function store()
    {
        $this->validate([
            'order' => 'required',
            'family' => 'required',
            'subfamily' => 'required',
            'gender' => 'required',
            'speci' => 'required',
            'genitalium' => 'required',
        ]);

        DB::beginTransaction();

        try {
            $order = Order::where('name', $this->order)->first();
            if (!$order) {
                $order = new Order();
                $order->name = $this->order;
                $order->save();
            }

            $family_exist = Family::where('name', $this->family)->first();
            if (!$family_exist) {
                $new_family = new Family();
                $new_family->name = $this->family;
                $new_family->order_id = $order->id;
                $new_family->save();
            }
            $subfamily_exist = Subfamily::where('name', $this->subfamily)->first();
            if (!$subfamily_exist) {
                $subfamily = new Subfamily();
                $subfamily->name = $this->subfamily;
                $subfamily->family_id = $new_family->id;
                $subfamily->save();
            }
            $gender = Gender::where('name', $this->gender)->first();
            if (!$gender) {
                $gender = new Gender();
                $gender->name = $this->gender;
                $gender->subfamily_id = $subfamily->id;
                $gender->save();
            }

            $species = Species::where('name', $this->speci)->first();
            if (!$species) {
                $species = new Species();
                $species->name = $this->speci;
                $species->gender_id = $gender->id;
                $species->save();
            }
            $genitalia = Genitalia::where('name', $this->genitalium)->first();
            if (!$genitalia) {
                $genitalia = new Genitalia();
                $genitalia->name = $this->genitalium;
                $genitalia->species_id = $species->id;
                $genitalia->save();
            }
            DB::commit();
            $this->reset();
            $this->showModal = false;
            $this->emitTo('collection-iteration.create', 'refreshOrders');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }
}
