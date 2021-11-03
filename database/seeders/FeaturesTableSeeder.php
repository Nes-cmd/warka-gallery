<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Feature;

class FeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Feature::create([
            'name' => 'Upload photos less than 10MB',
            'plan_id' => 1
        ]);
        Feature::create([
            'name' => 'Upload photos less than 10MB',
            'plan_id' => 2
        ]);
        Feature::create([
            'name' => 'No payment is needed again',
            'plan_id' => 2
        ]);
        Feature::create([
            'name' => 'Upload photos less than 30MB',
            'plan_id' => 3
        ]);
        Feature::create([
            'name' => 'Upload photos less than 30MB',
            'plan_id' => 4
        ]);
        // Feature::create([
        //     'name' => 'Size of photo is unlimited',
        //     'plan_id' => 5
        // ]);
        // Feature::create([
        //     'name' => 'Size of photo is unlimited',
        //     'plan_id' => 6
        // ]);
    }
}
