<?php

namespace App\Http\Livewire\CollectionIterations;

use App\Models\Bug;
use App\Models\Jar;
use Livewire\Component;
use App\Models\Collection;
use App\Models\PendingJob;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\CollectionIteration;
use App\Models\Family;
use App\Models\Gender;
use App\Models\Genitalia;
use App\Models\Order;
use App\Models\Species;
use App\Models\Subfamily;
use Illuminate\Support\Facades\Session;

class Create extends Component
{
    public $jars = [];
    public $jarStored;
    public $addJar = false;
    public $recolectionDate;
    public $jar_number;
    public $lastNumberJar = null;
    public $jarCode;
    public $collector;
    public $quantity;
    public $collection;
    public $collectionIterationId;
    public $collectionIteration;
    public $jarSelected;
    public $bug;
    public $date_iteration;
    public $period;
    public $digitizer;
    public $identifier;

    public $families = [];
    public $subfamilies = [];
    public $orders;
    public $species = [];
    public $genus = [];
    public $genitalia = [];
    public $colors;

    protected $listeners = ['refreshOrders' => 'refreshOrders'];



    public function mount(Collection $collection, $job = null)
    {
        if (Session::has('collectionIterationId')) {
            $this->collectionIterationId = Session::get('collectionIterationId');
            $this->collectionIteration = CollectionIteration::find($this->collectionIterationId);
            $this->period = $this->collectionIteration->period;
            $this->date_iteration = $this->collectionIteration->date;
            $this->identifier = $this->collectionIteration->identifier;
            $this->digitizer = $this->collectionIteration->digitizer;
        }

        $this->recolectionDate = date('Y-m-d');
    }

    public function render()
    {
        if ($this->lastNumberJar == null) {
            $this->getLastJarCollection();
        }
        if ($this->collectionIterationId != null) {
            $this->collectionIteration = CollectionIteration::find($this->collectionIterationId);
            $this->jarStored = $this->collectionIteration->jars;
        }
        $this->orders = Order::all();
        $this->collector = $this->collector;
        return view('livewire.collection-iterations.create');
    }

    public function getLastJarCollection()
    {

        $lastJar = Jar::where('code', 'like', explode('-', $this->collection->code)[0] . '-%')->orderByRaw('length(code),code')->get()->last()?->code;

        if ($lastJar == null) {
            $this->lastNumberJar = 0;
            $this->jarCode = explode('-', $this->collection->code)[0] . '-' . str_pad(($this->lastNumberJar + 1), 2, '0', STR_PAD_LEFT) . '-' . 'UNAH';
            $this->lastNumberJar = $this->lastNumberJar + 1;
            return;
        }
        $code = explode('-', $lastJar)[0];
        $jar_number = (int) explode('-', $lastJar,)[1];

        $this->lastNumberJar = $jar_number;

        $this->jarCode = $code . '-' . ($this->lastNumberJar + 1) . '-' . 'UNAH';
        $this->lastNumberJar = $this->lastNumberJar + 1;
    }


    public function generateJarCode()
    {
        $this->lastNumberJar = $this->lastNumberJar + 1;
        $last = $this->lastNumberJar;
        $lastJar =  explode('-', $this->collection->code)[0] . '-' . str_pad($last, 2, '0', STR_PAD_LEFT) . '-' . 'UNAH';
        $this->jarCode = $lastJar;
    }

    public function addJars()
    {
        $this->validate([
            'jarCode' => 'required',
            'quantity' => 'required',
            'recolectionDate' => 'required',
            'collector' => 'required',
        ]);
        $this->jars[$this->jarCode] =
            [
                'code' => $this->jarCode,
                'quantity' => $this->quantity,
                'recolection_date' => $this->recolectionDate,
                'collector' => $this->collector,

            ];
        $this->reset(['jarCode', 'quantity', 'collector']);
        $this->collector = $this->collector;
        $this->generateJarCode();
    }

    public function removeJar($code)
    {
        try {
            unset($this->jars[$code]);
            $this->lastNumberJar = $this->lastNumberJar - 2;
            $this->generateJarCode();
        } catch (\Exception $e) {
            $this->addError('jarCode', 'No se pudo eliminar el frasco');
        }
    }

    public function saveJars()
    {
        if (count($this->jars) == 0) {
            $this->addError('jarCode', 'No se ha agregado ningun frasco');
            return;
        } elseif ($this->collectionIterationId != null) {
            $this->updateJars();
            return;
        } elseif ($this->collectionIterationId == null) {
            $this->storeJars();
            return;
        }
    }

    public function storeJars()
    {
        try {
            DB::beginTransaction();
            $collectionIteration = CollectionIteration::create([
                'uuid' => Str::uuid(),
                'collection_id' => $this->collection->id,
                'date' => $this->date_iteration,
                'collector' => $this->collector,
                'created_by' => auth()->user()->id,
                'identifier' => $this->identifier,
                'digitizer' => $this->digitizer,
                'period' => $this->period,
                'status' => '0'
            ]);
            foreach ($this->jars as $jar) {
                $jar = Jar::create([
                    'code' => $jar['code'],
                    'uuid' => Str::uuid(),
                    'quantity' => $jar['quantity'],
                    'collector' => $jar['collector'],
                    'collection_iteration_id' => $collectionIteration->id,
                ]);
            }
            DB::commit();
            Session::put('collectionIterationId', $collectionIteration->id);
            $this->collectionIterationId = $collectionIteration->id;
            $this->jarStored = $collectionIteration->jars;
            $this->collectionIteration = $collectionIteration;
            $this->reset(['jarCode', 'quantity', 'collector', 'jars']);
            $this->storePendingJob();

            $this->addJar = false;
            $this->resetValidation();
        } catch (\Exception $e) {
            $this->addError('jarCode', $e->getMessage());
            DB::rollBack();
        }
    }
    public function storePendingJob()
    {
        try {
            $pendingJob = PendingJob::create([
                'uuid' => Str::uuid(),
                'job' => 'Recoleccion ' . $this->collection->code . ' Pediente',
                'pending_jobable_type' => \App\Models\User::class,
                'pending_jobable_id' => auth()->user()->id,
                'model_type' => CollectionIteration::class,
                'model_id' => $this->collectionIteration->id,
            ]);
            if ($pendingJob) {
                Session::put('pendingJobId', $pendingJob->id);
            }
            Session::put('pendingJobId', $pendingJob->id);
        } catch (\Exception $e) {
            $this->addError('jarCode', $e->getMessage());
        }
    }

    public function saveBugs()
    {
        $this->validate([
            'bug.family' => 'required',
            'bug.subfamily' => 'required',
            'bug.order' => 'required',
            'bug.species' => 'required',
            'bug.genus' => 'required',
            'bug.genitalia' => 'required',
            'bug.gender' => 'required',
            'bug.color' => 'required',
            'bug.size' => 'required',
        ]);

        $this->bug['jar_id'] = $this->jarSelected;
        $this->bug['uuid'] = Str::uuid();
        $this->bug['user_id'] = auth()->user()->id;
        $bug = Bug::create($this->bug);
        $bug->save();
        $this->clean();
    }

    public function messages()
    {
        return [
            "date_iteration.required" => "El campo Fecha de recoleccion es requerido",
            "period.required" => "El campo Periodo es requerido",
            "bug.family.required" => "El campo Familia es requerido",
            "bug.subfamily.required" => "El campo Subfamilia es requerido",
            "bug.order.required" => "El campo Orden es requerido",
            "bug.species.required" => "El campo Especie es requerido",
            "bug.genus.required" => "El campo Genero es requerido",
            "bug.genitalia.required" => "El campo Genitalia es requerido",
            "bug.gender.required" => "El campo Genero es requerido",
            "bug.color.required" => "El campo Color es requerido",
            "bug.size.required" => "El campo Tamaño es requerido"
        ];
    }

    public function rules()
    {
        return [
            "period" => "required",
            "date_iteration" => "required",
        ];
    }

    public function completeCollection()
    {

        try {
            DB::beginTransaction();
            $this->collectionIteration->status = '1';
            $this->collectionIteration->save();
            $this->removePendingJob();
            session()->flash('flash.banner', 'Recoleccion completada');
            DB::commit();
            return redirect()->route('collection-iterations.show', ['collection_iteration' => $this->collectionIteration]);
        } catch (\Exception $e) {
            $this->addError('jarCode', $e->getMessage());
            DB::rollBack();
        }
    }

    public function checkForComplete()
    {
        $jars = $this->collectionIteration->jars;
        foreach ($jars as $jar) {
            if ($jar->bugs->count() == 0) {
                $this->addError('FinishEroor', 'El frasco ' . $jar->code . ' no tiene insectos');
                return;
            }
        }
        $this->completeCollection();
    }

    public function removePendingJob()
    {

        if (!Session::has('pendingJobId')) {
            return;
        } else {
            try {
                $pendingJob = PendingJob::find(Session::get('pendingJobId'));
                Session::forget('collectionIterationId');
                $pendingJob->delete();
                Session::forget('pendingJobId');
            } catch (\Exception $e) {
                $this->addError('jarCode', $e->getMessage());
            }
        }
    }

    public function updatedBug()
    {
        if (isset($this->bug['order'])) {

            $order_id = Order::where('name', $this->bug['order'])->first()->id;
            $this->families = Family::where('order_id', $order_id)->get();
        }
        if (isset($this->bug['family'])) {
            $family_id = Family::where('name', $this->bug['family'])->first()->id;
            $this->subfamilies = Subfamily::where('family_id', $family_id)->get();
        }
        if (isset($this->bug['subfamily'])) {
            $subfamily_id = Subfamily::where('name', $this->bug['subfamily'])->first()->id;
            $this->genus = Gender::where('subfamily_id', $subfamily_id)->get();
        }
        if (isset($this->bug['genus'])) {
            $gender_id = Gender::where('name', $this->bug['genus'])->first()->id;
            $this->species = Species::where('gender_id', $gender_id)->get();
        }
        if (isset($this->bug['species'])) {
            $species_id = Species::where('name', $this->bug['species'])->first()->id;
            $this->genitalia = Genitalia::where('species_id', $species_id)->get();
        }
    }

    public function clean()
    {
        $this->reset(['bug', 'families', 'subfamilies', 'genus', 'species', 'genitalia']);
    }

    public function refreshOrders()
    {

        $this->orders = Order::all();
    }
}
