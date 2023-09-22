<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CollectionSeeder extends Seeder
{
    public $collection = '[
        {
            "regional_id": "1",
            "code": "RFEQ-02-2023",
            "department": "Lempira",
            "municipality": "Belén",
            "place": "El Quiabán",
            "x": "305070",
            "y": "1601083",
            "altitud": "2035"
        },
        {
            "regional_id": "1",
            "code": "RFOC-12-2018",
            "department": "Copán",
            "municipality": "Santa Rosa de Copán",
            "place": "El Rodeo",
            "x": "312157",
            "y": "1630452",
            "altitud": "1208"
        },
        {
            "regional_id": "1",
            "code": "RFOC-13-2018",
            "department": "Lempira",
            "municipality": "Belén",
            "place": "Rodeo Cosire",
            "x": "337089",
            "y": "1599385",
            "altitud": "1010"
        },
        {
            "regional_id": "1",
            "code": "RFOC-18-2018",
            "department": "Lempira",
            "municipality": "Gracias",
            "place": "Villa Verde",
            "x": "323986",
            "y": "1610883",
            "altitud": "1232"
        },
        {
            "regional_id": "1",
            "code": "RFOC-19-2018",
            "department": "Copán",
            "municipality": "Santa Rosa de Copán",
            "place": "La Hondura",
            "x": "306376",
            "y": "1633142",
            "altitud": "1308"
        },
        {
            "regional_id": "1",
            "code": "RFOC-20-2018",
            "department": "Copán",
            "municipality": "Santa Rita",
            "place": "La Calichosa",
            "x": "282899",
            "y": "1648033",
            "altitud": "747"
        },
        {
            "regional_id": "2",
            "code": "RFNO-11-2018",
            "department": "Cortés",
            "municipality": "San Pedro Sula",
            "place": "Ladrillos",
            "x": "374168",
            "y": "1711336",
            "altitud": "819"
        },
        {
            "regional_id": "2",
            "code": "RFNO-21-2018",
            "department": "Santa Bárbara",
            "municipality": "Santa Bárbara",
            "place": "Plan de Antena",
            "x": "364852",
            "y": "1640245",
            "altitud": "513"
        },
        {
            "regional_id": "3",
            "code": "RFFM-06-2018",
            "department": "Francisco Morazán",
            "municipality": "Distrito Central",
            "place": "Zambrano",
            "x": "455093",
            "y": "1579778",
            "altitud": "1424"
        },
        {
            "regional_id": "3",
            "code": "RFFM-07-2018",
            "department": "Francisco Morazán",
            "municipality": "Valle de Ángeles",
            "place": "Parque Obrero",
            "x": "495419",
            "y": "1563076",
            "altitud": "1313"
        },
        {
            "regional_id": "3",
            "code": "RFFM-22-2019",
            "department": "Francisco Morazán",
            "municipality": "Lepaterique",
            "place": "Lepaterique",
            "x": "448387",
            "y": "1554493",
            "altitud": "1451"
        },
        {
            "regional_id": "3",
            "code": "RFFM-24-2019",
            "department": "Francisco Morazán",
            "municipality": "Orica",
            "place": "Guamiles",
            "x": "509282",
            "y": "1619865",
            "altitud": "1018"
        },
        {
            "regional_id": "3",
            "code": "RFFM-29-2020",
            "department": "Francisco Morazán",
            "municipality": "Tatumbla",
            "place": "Cofradia",
            "x": "488136",
            "y": "1548371",
            "altitud": "1303"
        },
        {
            "regional_id": "3",
            "code": "RFFM-39-2020",
            "department": "Francisco Morazán",
            "municipality": "San Juan de Flores",
            "place": "Joyas de Carballo",
            "x": "510795",
            "y": "1583121",
            "altitud": "1096"
        },
        {
            "regional_id": "3",
            "code": "RFFM-41-2020",
            "department": "Francisco Morazán",
            "municipality": "Cedros",
            "place": "San Francisco",
            "x": "481693",
            "y": "1611904",
            "altitud": "890"
        },
        {
            "regional_id": "3",
            "code": "RFFM-43-2020",
            "department": "Francisco Morazán",
            "municipality": "Talanga",
            "place": "Izote",
            "x": "505270",
            "y": "1593275",
            "altitud": "1075"
        },
        {
            "regional_id": "4",
            "code": "RFO-03-2018",
            "department": "Olancho",
            "municipality": "La Unión",
            "place": "Portillo de Piedra",
            "x": "528966",
            "y": "1665568",
            "altitud": "1269"
        },
        {
            "regional_id": "4",
            "code": "RFO-10-2018",
            "department": "Olancho",
            "municipality": "Juticalpa",
            "place": "Calpules",
            "x": "559154",
            "y": "1621581",
            "altitud": "1025"
        },
        {
            "regional_id": "4",
            "code": "RFO-30-2020",
            "department": "Olancho",
            "municipality": "Silca",
            "place": "San Francisco de Ulua",
            "x": "544118",
            "y": "1626875",
            "altitud": "745"
        },
        {
            "regional_id": "4",
            "code": "RFO-32-2020",
            "department": "Olancho",
            "municipality": "Concordia",
            "place": "Dulce Nombre y Peladero",
            "x": "540442",
            "y": "1615458",
            "altitud": "664"
        },
        {
            "regional_id": "4",
            "code": "RFO-33-2020",
            "department": "Olancho",
            "municipality": "Campamento",
            "place": "La Picona",
            "x": "536838",
            "y": "1609368",
            "altitud": "730"
        },
        {
            "regional_id": "4",
            "code": "RFO-40-2020",
            "department": "Olancho",
            "municipality": "Jano",
            "place": "Mucupina",
            "x": "545465",
            "y": "1666913",
            "altitud": "945"
        },
        {
            "regional_id": "4",
            "code": "RFO-42-2020",
            "department": "Olancho",
            "municipality": "Culmí",
            "place": "Las Icoteas",
            "x": "651478",
            "y": "1664618",
            "altitud": "560"
        },
        {
            "regional_id": "5",
            "code": "RFCO-02-2018",
            "department": "Comayagua",
            "municipality": "Villa de San Antonio",
            "place": "Chagüite Grande ",
            "x": "407402",
            "y": "1613945",
            "altitud": "1106"
        },
        {
            "regional_id": "5",
            "code": "RFCO-14-2018",
            "department": "Intibucá",
            "municipality": "Jesús de Otoro",
            "place": "El Suntul ",
            "x": "398644",
            "y": "1600666",
            "altitud": "820"
        },
        {
            "regional_id": "5",
            "code": "RFCO-15-2018",
            "department": "La Paz",
            "municipality": "Marcala",
            "place": "El Pelón",
            "x": "383348",
            "y": "1572590",
            "altitud": "1533"
        },
        {
            "regional_id": "5",
            "code": "RFCO-16-2018",
            "department": "Intibucá",
            "municipality": "San Juan",
            "place": "Cataulaca",
            "x": "341972",
            "y": "1593353",
            "altitud": "1526"
        },
        {
            "regional_id": "5",
            "code": "RFCO-17-2018",
            "department": "Intibucá",
            "municipality": "Yamaranguila",
            "place": "Las Arenas",
            "x": "363680",
            "y": "1583141",
            "altitud": "1612"
        },
        {
            "regional_id": "5",
            "code": "RFCO-23-2019",
            "department": "Comayagua",
            "municipality": "Siguatepeque",
            "place": "UNACIFOR",
            "x": "412428",
            "y": "1611076",
            "altitud": "1152"
        },
        {
            "regional_id": "5",
            "code": "RFCO-26-2020",
            "department": "La Paz",
            "municipality": "San Pedro de Tutule",
            "place": "La Chanchera",
            "x": "407743",
            "y": "1573981",
            "altitud": "1450"
        },
        {
            "regional_id": "5",
            "code": "RFCO-28-2020",
            "department": "Comayagua",
            "municipality": "San Luis",
            "place": "Las Guarumas",
            "x": "456729",
            "y": "1632464",
            "altitud": "830"
        },
        {
            "regional_id": "5",
            "code": "RFCO-34-2020",
            "department": "Comayagua",
            "municipality": "San Luis",
            "place": "Pueblo Nuevo",
            "x": "415807",
            "y": "1631613",
            "altitud": "709"
        },
        {
            "regional_id": "6",
            "code": "RFNEO-05-2018",
            "department": "Olancho",
            "municipality": "San Esteban",
            "place": "El Aguacatal",
            "x": "650766",
            "y": "1694875",
            "altitud": "1081"
        },
        {
            "regional_id": "6",
            "code": "RFNEO-25-2019",
            "department": "Olancho",
            "municipality": "Gualaco",
            "place": "Jacaleapa",
            "x": "581011",
            "y": "1674839",
            "altitud": "929"
        },
        {
            "regional_id": "6",
            "code": "RFNEO-27-2019",
            "department": "Olancho",
            "municipality": "Gualaco",
            "place": "El Barracón ",
            "x": "588546",
            "y": "1682388",
            "altitud": "987"
        },
        {
            "regional_id": "7",
            "code": "RFEP-04-2018",
            "department": "El Paraíso",
            "municipality": "Danlí",
            "place": "El Suyatillo",
            "x": "536754",
            "y": "1562324",
            "altitud": "1185"
        },
        {
            "regional_id": "7",
            "code": "RFEP-09-2018",
            "department": "El Paraíso",
            "municipality": "Jacaleapa",
            "place": "El Blanquillo",
            "x": "534002",
            "y": "1552559",
            "altitud": "940"
        },
        {
            "regional_id": "7",
            "code": "RFEP-35-2020",
            "department": "El Paraíso",
            "municipality": "Yuscarán",
            "place": "Los Tablones",
            "x": "517068",
            "y": "1545972",
            "altitud": "1123"
        },
        {
            "regional_id": "7",
            "code": "RFEP-37-2020",
            "department": "El Paraíso",
            "municipality": "Guinope",
            "place": "Lavanderos",
            "x": "506018",
            "y": "1540332",
            "altitud": "1351"
        },
        {
            "regional_id": "7",
            "code": "RFEP-38-2020",
            "department": "El Paraíso",
            "municipality": "Teupasenti",
            "place": "Sabana Grande ",
            "x": "531489",
            "y": "1581695",
            "altitud": "1017"
        },
        {
            "regional_id": "8",
            "code": "RFY-01-2018",
            "department": "Yoro",
            "municipality": "Yoro",
            "place": "Carrizalito",
            "x": "487638",
            "y": "1683710",
            "altitud": "880"
        },
        {
            "regional_id": "8",
            "code": "RFNY-01-2023",
            "department": "Yoro",
            "municipality": "El Negrito",
            "place": "Las Minitas",
            "x": "425981",
            "y": "1636675",
            "altitud": "317"
        },
        {
            "regional_id": "8",
            "code": "RFY-31-2020",
            "department": "Yoro",
            "municipality": "El Negrito",
            "place": "La Pita",
            "x": "426482",
            "y": "1696639",
            "altitud": "388"
        },
        {
            "regional_id": "8",
            "code": "RFY-36-2020",
            "department": "Yoro",
            "municipality": "Jocón",
            "place": "Reservo Éjidos de Jocón",
            "x": "510995",
            "y": "1690868",
            "altitud": "828"
        },
        {
            "regional_id": "9",
            "code": "RFSMC-03-2023",
            "department": "Choluteca",
            "municipality": "San Marcos de Colón",
            "place": "San Andrés de Las Lajas",
            "x": "510221",
            "y": "1485830",
            "altitud": "1251"
        }

    ]';
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $collections = json_decode($this->collection);
        foreach ($collections as $collection) {
            dump($collection);
            $municipality = \App\Models\Municipality::where('name', 'like', "%" . $collection->municipality . "%")->first();
            $collection = \App\Models\Collection::create([
                'regional_id' => $collection->regional_id,
                'uuid' => \Illuminate\Support\Str::uuid(),
                'code' => $collection->code,
                'municipality_id' => $municipality->id,
                'place' => $collection->place,
                'location' => DB::raw("ST_GeomFromText('POINT($collection->x $collection->y)')"),
                'altitude' => $collection->altitud,
            ]);
            $collection->save();
        }
    }
}
