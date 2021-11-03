<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sortings;

class SortingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Sortings::create(['name' => 'Created date ascending', 'code' => 'created_at']);
        Sortings::create(['name' => 'Created date descending', 'code'=> '1created_at']);
        Sortings::create(['name' => 'Name assending', 'code' => 'name']);
        Sortings::create(['name' => 'Name Decsendimg', 'code' => '1name']);
    }
}
