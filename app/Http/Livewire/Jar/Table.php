<?php

namespace App\Http\Livewire\Jar;

use App\Models\Bug;
use App\Models\Order;
use App\Models\Family;
use App\Models\Gender;
use App\Models\Species;
use Livewire\Component;
use App\Models\Genitalia;
use App\Models\Subfamily;
use Illuminate\Support\Facades\DB;
use App\Models\CollectionIteration;

class Table extends Component
{
    public $collectionIteration;
    public $jars;
    public $showModal = false;
    public $jarSelectedId;
    public $jarSelected;
    public $bugSelected;
    public $families = [];
    public $subfamilies = [];
    public $orders;
    public $species = [];
    public $genus = [];
    public $genitalia = [];

    public $jarCodeUpdate = '';
    public $jarCodeUpdateComplete;
    protected $listeners = ['updateJarSelected' => 'refreshJarSelected'];


    public function mount(CollectionIteration $collectionIteration)
    {
        $this->bugSelected = new Bug();
        $this->orders = Order::all();
        $this->collectionIteration = $collectionIteration;
    }
    public function render()
    {
        $this->jars = $this->collectionIteration->jars;
        return view('livewire.jar.table', ['collectionIteration' => $this->collectionIteration]);
    }

    public function updatedJarSelectedId()
    {
        $this->jarSelected = $this->collectionIteration->jars->find($this->jarSelectedId);
        $this->jarCodeUpdate = explode('-', $this->jarSelected->code)[1];
        $this->showModal = true;
    }

    public function updatedShowModal()
    {
        if ($this->showModal == false) {
            $this->bugSelected = new Bug();
        }
    }
    public function closeModal()
    {
        $this->showModal = false;
    }

    public function deleteJar()
    {
        $this->collectionIteration->jars()->detach($this->jarSelectedId);
        $this->showModal = false;
    }

    public function editBug($lbugid)
    {
        $this->bugSelected = Bug::find($lbugid)->toArray();
        $this->updatedBugSelected();
    }
    public function updatedBugSelected()
    {


        if (isset($this->bugSelected['order'])) {
            $order_id = Order::where('name', $this->bugSelected['order'])->first()->id;
            $this->families = Family::where('order_id', $order_id)->get();
        }
        if (isset($this->bugSelected['family'])) {
            $family_id = Family::where('name', $this->bugSelected['family'])->first()?->id;
            $this->subfamilies = Subfamily::where('family_id', $family_id)->get();
        }
        if (isset($this->bugSelected['subfamily'])) {
            $subfamily_id = Subfamily::where('name', $this->bugSelected['subfamily'])->first()?->id;
            $this->genus = Gender::where('subfamily_id', $subfamily_id)->get();
        }
        if (isset($this->bugSelected['genus'])) {
            $gender_id = Gender::where('name', $this->bugSelected['genus'])->first()?->id;
            $this->species = Species::where('gender_id', $gender_id)->get();
        }
        if (isset($this->bugSelected['species'])) {
            $species_id = Species::where('name', $this->bugSelected['species'])->first()?->id;
            $this->genitalia = Genitalia::where('species_id', $species_id)->get();
        }
    }

    public function saveBug()
    {
        $this->validate([
            'bugSelected.order' => 'required',
            'bugSelected.family' => 'required',
            'bugSelected.subfamily' => 'required',
            'bugSelected.genus' => 'required',
            'bugSelected.species' => 'required',
            'bugSelected.size' => 'required',
            'bugSelected.color' => 'required',
            'bugSelected.genitalia' => 'required',
        ]);
        try {
            DB::beginTransaction();
            $bug = Bug::find($this->bugSelected['id']);
            $bug->order = $this->bugSelected['order'];
            $bug->family = $this->bugSelected['family'];
            $bug->subfamily = $this->bugSelected['subfamily'];
            $bug->genus = $this->bugSelected['genus'];
            $bug->species = $this->bugSelected['species'];
            $bug->genitalia = $this->bugSelected['genitalia'];
            $bug->color = $this->bugSelected['color'];
            $bug->gender = $this->bugSelected['gender'];
            $bug->size = $this->bugSelected['size'];
            $bug->save();
            DB::commit();
            $this->bugSelected = new Bug();
            $this->emit('updateJarSelected', $this->jarSelectedId);
        } catch (\Exception $e) {
            dd($e);
            DB::rollBack();
        }
    }

    public function refreshJarSelected($jarSelectedId)
    {
        $this->jarSelectedId = $jarSelectedId;
    }

    public function updateJar()
    {
        $this->jarCodeUpdateComplete = explode('-', $this->jarSelected->code)[0] . '-' . $this->jarCodeUpdate . '-' . explode('-', $this->jarSelected->code)[2];

        $this->validate([
            'jarCodeUpdateComplete' => 'required|unique:jars,code',
        ], [
            'jarCodeUpdateComplete.required' => 'El código es requerido',
            'jarCodeUpdateComplete.unique' => 'El código ya existe',
        ]);
        try {
            DB::beginTransaction();
            $jar = $this->collectionIteration->jars->find($this->jarSelectedId);
            $jar->code = $this->jarCodeUpdateComplete;
            $jar->save();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e);
        }
    }
}
