<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class Administrator extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Administrator user
        $user = \App\Models\User::create([
            'name' => 'Nesru Sadik',
            'phone' => '251940678725',
            'email' => 'nesrusadik0@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
        ]);
        // Role
        $role = \App\Models\Role::select('id')->where('name', 'app_admin')->first();
        $user->roles()->attach($role);
        // Payment
        $plan = \App\Models\Plan::where('name', 'premium one time')->first();
        \App\Models\Payment::create([
            'user_id' => $user->id,
            'process_id' => 0,
            'amount' => $plan->amount_required,
            'plan_id' => $plan->id,
            'payed_at' => time(),
            'next_payment_at' => time() + 31557600 // 1 Year
        ]);
        //Default category configuration
        $cat = \App\Models\Category::create(['user_id' => $user->id,'name' => 'All']);
        \App\Models\DefaultSetting::create([
            'user_id' => $user->id,
            'table_name' => 'categories',
            'table_id' => $cat->id
        ]);
        // Default sorting
        $defaultSortingId = \App\Models\Sortings::where('code', 'created_at')->first()->id;
        \App\Models\DefaultSetting::create([
            'user_id' => $user->id,
            'table_name' => 'sortings',
            'table_id' => $defaultSortingId
        ]);

       // Default size for large screens
        $defaultLargeSizeId = \DB::table('default_sizes')->where('name', 'Small')->whereAnd('type', 'md')->first()->id;
        \App\Models\DefaultSetting::create([
            'user_id' => $user->id,
            'table_name' => 'default_large_sizes',
            'table_id' => $defaultLargeSizeId
        ]);
        // Default size for Small screens
        $defaultSmallSizeId = \DB::table('default_sizes')->where('name', 'Normal')->whereAnd('type', 'sm')->first()->id;
        \App\Models\DefaultSetting::create([
            'user_id' => $user->id,
            'table_name' => 'default_small_sizes',
            'table_id' => $defaultSmallSizeId
        ]);

    }
}
