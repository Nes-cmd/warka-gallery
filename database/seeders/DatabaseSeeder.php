<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PlansTableSeeder::class);
        $this->call(FeaturesTableSeeder::class);
        $this->call(PaymentMethodSeeder::class);
        
        $this->call(RoleTableSeeder::class);
        $this->call(SortingsSeeder::class);
        $this->call(DefaultSizeSeeder::class);
        
        // \App\Models\User::factory(10)->create();
        $this->call(Administrator::class);
    }
}
