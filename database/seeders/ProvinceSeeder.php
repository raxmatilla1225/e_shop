<?php

namespace Database\Seeders;

use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProvinceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // id name province_id
        $data = [

            'toshkent shahar'=>[
                'yunusobod tumani',
                'shayhontohur tumani'
            ]
        ];
        foreach($data as $key => $value){
            $region = new Province();
            $region->name = $key;
            $region->province_id = null;
            $region->save();
            foreach ($value as $reg){
                $reg1 = new Province();
                $reg1->name = $reg;
                $reg1->province_id = $region->id;
                $reg1->save();
            }
        }
    }
}

