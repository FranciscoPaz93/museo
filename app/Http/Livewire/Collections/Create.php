<?php

namespace App\Http\Livewire\Collections;

use Livewire\Component;
use App\Models\Regional;
use App\Models\Department;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\DB;

class Create extends Component
{
    public $regional_id;
    public $regional;
    public $department_id;
    public $municipality_id;
    public $place;
    public $longitude;
    public $latitude;
    public $altitude;
    public $code;

    public $departments;
    public $municipalities;



    public function mount(Regional $regional)
    {
        $this->regional = $regional;
        $this->regional_id = $regional->id;
        $this->departments = Department::all();
        $this->municipalities = collect();
    }
    public function render()
    {

        return view('livewire.collections.create')->with('regional', $this->regional);
    }

    public function updatedDepartmentId($department_id)
    {
        $this->municipality_id = '';
        $this->municipalities = Department::find($department_id)->municipalities;
    }


    public function storeCollection()
    {
        $this->validate();
        $collection = \App\Models\Collection::create([
            'uuid' => \Illuminate\Support\Str::uuid(),
            'regional_id' => $this->regional_id,
            'municipality_id' => $this->municipality_id,
            'place' => $this->place,
            'code' => $this->code,
        ]);
        $collection->save();
        $location = \App\Models\Location::create([
            'coordinates' => DB::raw("ST_GeomFromText('POINT($this->longitude $this->latitude)')"),
            'altitude' => $this->altitude,
            'collection_id' => $collection->id,
            'reason' => 'Colección',
        ]);
        $location->save();

        return redirect()->route('regionals.show', ['regional' => $this->regional_id]);
    }
    public function rules()
    {
        return [
            'department_id' => 'required',
            'municipality_id' => 'required',
            'place' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'altitude' => 'required',
            'code' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'department_id.required' => 'El campo departamento es requerido.',
            'municipality_id.required' => 'El campo municipio es requerido.',
            'place.required' => 'El campo lugar es requerido.',
            'longitude.required' => 'El campo longitud es requerido.',
            'latitude.required' => 'El campo latitud es requerido.',
            'altitude.required' => 'El campo altitud es requerido.',
            'code.required' => 'El campo código es requerido.',
        ];
    }
}
