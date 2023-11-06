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






    public function mount(Collection $collection, $job = null)
    {
        if (Session::has('collectionIterationId')) {
            $this->collectionIterationId = Session::get('collectionIterationId');
            $this->collectionIteration = CollectionIteration::find($this->collectionIterationId);
            $this->period = $this->collectionIteration->period;
            $this->date_iteration = $this->collectionIteration->date;
        }
        $this->collector = auth()->user()->name;
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
        return view('livewire.collection-iterations.create');
    }

    public function getLastJarCollection()
    {

        $lastJar = Jar::where('code', 'like', explode('-', $this->collection->code)[0] . '%')->get()->last()?->code;
        if ($lastJar == null) {
            $this->lastNumberJar = 0;
            $this->jarCode = explode('-', $this->collection->code)[0] . '-' . str_pad(($this->lastNumberJar + 1), 2, '0', STR_PAD_LEFT) . '-' . 'UNAH';
            $this->lastNumberJar = $this->lastNumberJar + 1;
            return;
        }
        $code = explode('-', $lastJar)[0];
        $jar_number = explode('-', $lastJar,)[1];
        $this->lastNumberJar = $jar_number + 1;

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
        $this->collector = auth()->user()->name;
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
                'period' => $this->period,
                'status' => '0'
            ]);
            foreach ($this->jars as $jar) {
                $jar = Jar::create([
                    'code' => $jar['code'],
                    'uuid' => Str::uuid(),
                    'quantity' => $jar['quantity'],
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
        } catch (\Exception $e) {
            $this->addError('jarCode', $e->getMessage());
            DB::rollBack();
        }
    }
    public function storePendingJob()
    {
        try {
            PendingJob::create([
                'uuid' => Str::uuid(),
                'job' => 'Recoleccion ' . $this->collection->code . ' Pediente',
                'pending_jobable_type' => \App\Models\User::class,
                'pending_jobable_id' => auth()->user()->id,
                'model_type' => CollectionIteration::class,
                'model_id' => $this->collectionIteration->id,
            ]);
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
        $this->reset(['bug']);
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
                $pendingJob->delete();
                Session::forget('pendingJobId');
            } catch (\Exception $e) {
                $this->addError('jarCode', $e->getMessage());
            }
        }
    }
}
