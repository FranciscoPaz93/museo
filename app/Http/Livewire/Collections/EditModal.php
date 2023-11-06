<?php

namespace App\Http\Livewire\Collections;

use Livewire\Component;
use App\Models\Collection;
use App\Models\Location;
use Illuminate\Support\Facades\DB;

class EditModal extends Component
{
    public $showModal = false;
    public $collection;
    public $department_id;
    public $municipality_id;
    public $place;
    public $longitude;
    public $latitude;
    public $altitude;
    public $reason;
    public $departments;
    public $municipalities;

    public $geoModify = false;


    public function mount(Collection $collection)
    {
        $this->collection = $collection;
        $this->department_id = $collection->municipality->department_id;
        $this->municipality_id = $collection->municipality_id;
        $this->place = $collection->place;
        $this->longitude = $collection->locations()->coordinates->longitude;
        $this->latitude = $collection->locations()->coordinates->latitude;
        $this->altitude = $collection->locations()->altitude;
        $this->reason = '';
        $this->departments = \App\Models\Department::all();
        $this->municipalities = \App\Models\Municipality::where('department_id', $this->department_id)->get();
    }


    public function render()
    {

        return view('livewire.collections.edit-modal');
    }

    public function updatedDepartmentId($value)
    {
        $this->municipality_id = '';
        $this->municipalities = \App\Models\Municipality::where('department_id', $value)->get();
    }

    public function updateCollection()
    {
        $this->validate();
        $this->collection->update([
            'municipality_id' => $this->municipality_id,
            'place' => $this->place,
        ]);
        if ($this->geoModify) {
            $this->collection->locations()->delete();
            $location = Location::create([
                'coordinates' => DB::raw("ST_GeomFromText('POINT($this->longitude $this->latitude)')"),
                'collection_id' => $this->collection->id,
                'altitude' => $this->altitude,
                'reason' => $this->reason,
            ]);
        }

        return redirect()->route('collections.show', $this->collection);
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
        ];
    }

    public function messages()
    {
        return [
            'department_id.required' => 'El campo departamento es requerido',
            'municipality_id.required' => 'El campo municipio es requerido',
            'place.required' => 'El campo lugar es requerido',
            'longitude.required' => 'El campo longitud es requerido',
            'latitude.required' => 'El campo latitud es requerido',
            'altitude.required' => 'El campo altitud es requerido',
        ];
    }

    public function restoreLastValues()
    {
        $this->department_id = $this->collection->municipality->department_id;
        $this->municipality_id = $this->collection->municipality_id;
        $this->place = $this->collection->place;
        $this->longitude = $this->collection->locations()->coordinates->longitude;
        $this->latitude = $this->collection->locations()->coordinates->latitude;
        $this->altitude = $this->collection->locations()->altitude;
        $this->geoModify = false;
    }

    public function updatedLongitude($value)
    {
        $this->geoModify = true;
    }

    public function updatedLatitude($value)
    {
        $this->geoModify = true;
    }

    public function updatedAltitude($value)
    {
        $this->geoModify = true;
    }
}
