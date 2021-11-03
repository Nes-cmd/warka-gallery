<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Plan;

class PlansTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Plan::create([
            'name' => 'normal',// XXX birr per year
            'amount_required' => 500,
        ]);
        Plan::create([
            'name' => 'premium', //XXL birr per year
            'amount_required' => 800,
        ]);
        Plan::create([
            'name' => 'normal one time', // One time XXXXX birr 
            'amount_required' => 3500,
        ]);
        Plan::create([
            'name' => 'premium one time', // One time XXXXL birr 
            'amount_required' => 5000,
        ]);
        ////////////////////////////////////////////////////////////////////////
        // Plan::create([
        //     'name' => 'professional', // One time XXXXL birr 
        //     'amount_required' => 3500,
        // ]);
        // Plan::create([
        //     'name' => 'professional one time', // One time XXXXL birr 
        //     'amount_required' => 11000,
        // ]);
    }
}
