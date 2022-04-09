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
            $vil = new Province();
            $vil->name=$key;
            $vil->province_id = null;
            if($vil->name==$value)
            {
             $vil->name=$value;
             $vil->province_id=1  ;         
            }
            $vil->save();
        }
    }
}

