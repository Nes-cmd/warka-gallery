<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\models\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create(
            [
                'name' => 'default category',
                'descreption' => 'The cagtegory always loaded without being selected.'
            ],
            [
                'name' => 'default sorting',
                'descreption' => 'When the photos are loaded sorted by this'
            ],
            [
                'name' => 'default lagge size',
                'descreption' => 'Size of photo displayed on large screens like Pcs'
            ],
            [
                'name' => 'default sorting',
                'descreption' => 'Size of photo displayed on small screens like Mobiles'
            ],
        );
    }
}
