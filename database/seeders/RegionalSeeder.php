<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionalSeeder extends Seeder
{
    public $regionals = '[
        {
            "code": "RFOC ",
            "name": "Región Forestal Occidente"
        },
        {
            "code": "RFNO ",
            "name": "Región Forestal Noroccidente"
        },
        {
            "code": "RFFM ",
            "name": "Región Forestal Francisco Morazán"
        },
        {
            "code": "RFO ",
            "name": "Región Forestal Olancho"
        },
        {
            "code": "RFCO ",
            "name": "Región Forestal Comayagua"
        },
        {
            "code": "RFNEO ",
            "name": "Región Forestal Olancho Noreste"
        },
        {
            "code": "RFEP ",
            "name": "Región Forestal El Paraíso"
        },
        {
            "code": "RFY ",
            "name": "Región Forestal Yoro"
        },
        {
            "code": "RFSMC",
            "name": "Región Forestal San Marcos de Colón"
        }
    ]';
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $regionals = json_decode($this->regionals);
        foreach ($regionals as $regional) {
            $regional = \App\Models\Regional::create([
                'identity' => $regional->code,
                'uuid' => \Illuminate\Support\Str::uuid(),
                'name' => $regional->name,
            ]);
            $regional->save();
        }
    }
}
