<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    public $departments = '[
        {
            "id": "1",
            "name": "Atlántida",
            "capital": "La Ceiba",
            "area": "4227  "
        },
        {
            "id": "2",
            "name": "Colón",
            "capital": "Trujillo",
            "area": "8276  "
        },
        {
            "id": "3",
            "name": "Comayagua",
            "capital": "Comayagua",
            "area": "5120  "
        },
        {
            "id": "4",
            "name": "Copán",
            "capital": "Santa Rosa de Copán",
            "area": "3239  "
        },
        {
            "id": "5",
            "name": "Cortés",
            "capital": "San Pedro Sula",
            "area": "3911  "
        },
        {
            "id": "6",
            "name": "Choluteca",
            "capital": "Choluteca",
            "area": "4397  "
        },
        {
            "id": "7",
            "name": "El Paraíso",
            "capital": "Yuscarán",
            "area": "7383  "
        },
        {
            "id": "8",
            "name": "Francisco Morazán",
            "capital": "Distrito Central",
            "area": "8580  "
        },
        {
            "id": "9",
            "name": "Gracias a Dios",
            "capital": "Puerto Lempira",
            "area": "15876  "
        },
        {
            "id": "10",
            "name": "Intibucá",
            "capital": "La Esperanza",
            "area": "3126  "
        },
        {
            "id": "11",
            "name": "Islas de la Bahía",
            "capital": "Roatán",
            "area": "229  "
        },
        {
            "id": "12",
            "name": "La Paz",
            "capital": "La Paz",
            "area": "2534  "
        },
        {
            "id": "13",
            "name": "Lempira",
            "capital": "Gracias",
            "area": "4285  "
        },
        {
            "id": "14",
            "name": "Ocotepeque",
            "capital": "Nueva Ocotepeque",
            "area": "1636  "
        },
        {
            "id": "15",
            "name": "Olancho",
            "capital": "Juticalpa",
            "area": "24038  "
        },
        {
            "id": "16",
            "name": "Santa Bárbara",
            "capital": "Santa Bárbara",
            "area": "5013  "
        },
        {
            "id": "17",
            "name": "Valle",
            "capital": "Nacaome",
            "area": "1618  "
        },
        {
            "id": "18",
            "name": "Yoro",
            "capital": "Yoro",
            "area": "7787  "
        }
    ]';
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $departments = json_decode($this->departments);
        foreach ($departments as $department) {
            \App\Models\Department::create([
                'id' => $department->id,
                'name' => $department->name,
                'capital' => $department->capital,
                'area' => $department->{'area'},
            ]);
        }
        //
    }
}
