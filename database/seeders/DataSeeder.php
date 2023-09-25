<?php

namespace Database\Seeders;

use App\Models\Bug;
use App\Models\Jar;
use App\Models\Collection;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\CollectionIteration;
use Illuminate\Support\Facades\File;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = File::get("public/json/csvjson.json");
        $data = json_decode($json);
        foreach ($data as $obj) {
            DB::beginTransaction();

            try {
                $collection_exist = Collection::where('code', $obj->codigo)->first();
                dump($collection_exist);
                $jar_exist = Jar::where('code', $obj->bote)->first();
                dump($jar_exist);
                if (!$jar_exist) {
                    $iteration_exist = CollectionIteration::where('date', $obj->date)->first();
                    dump($iteration_exist);
                    if (!$iteration_exist) {
                        $iteration = new CollectionIteration();
                        $iteration->uuid = Str::uuid();
                        $iteration->collection_id = $collection_exist->id;
                        $iteration->date = $obj->date;
                        $iteration->collector = $obj->colector;
                        $iteration->identifier = $obj->identificador;
                        $iteration->period = $obj->periodo;
                        $iteration->save();
                        $jar = new Jar();
                        $jar->code = $obj->bote;
                        $jar->uuid = Str::uuid();
                        $jar->collection_iteration_id = $iteration->id;
                        $jar->save();
                    } else {
                        $jar = new Jar();
                        $jar->code = $obj->bote;
                        $jar->uuid = Str::uuid();
                        $jar->collection_iteration_id = $iteration_exist->id;
                        $jar->save();
                    }
                    $bug = Bug::create([
                        'uuid' => Str::uuid(),
                        'order' => $obj->orden,
                        'family' => $obj->familia,
                        'subfamily' => $obj->sub_familia,
                        'genus' => $obj->genero,
                        'species' => $obj->especie,
                        'genitalia_results' => $obj->genitalia,
                        'final_result' => $obj->resultado_final,
                        'gender' => $obj->sexo,
                        'color' => $obj->color,
                        'size' => $obj->tamano,
                        'jar_id' => $jar->id,
                    ]);
                    $bug->save();
                } else {
                    $bug = Bug::create([
                        'uuid' => Str::uuid(),
                        'order' => $obj->orden,
                        'family' => $obj->familia,
                        'subfamily' => $obj->sub_familia,
                        'genus' => $obj->genero,
                        'species' => $obj->especie,
                        'genitalia_results' => $obj->genitalia,
                        'final_result' => $obj->resultado_final,
                        'gender' => $obj->sexo,
                        'color' => $obj->color,
                        'size' => $obj->tamano,
                        'jar_id' => $jar_exist->id,
                    ]);
                    $bug->save();
                }
                DB::commit();
            } catch (\Exception $e) {
                DB::rollBack();
                dd($e->getMessage());
            }
        }
    }
}
