<?php

namespace App\Actions\Fortify;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class CreateNewUser implements CreatesNewUsers
{
    use PasswordValidationRules;

    /**
     * Validate and create a newly registered user.
     *
     * @param  array  $input
     * @return \App\Models\User
     */
    public function create(array $input)
    {
        
        Validator::make($input, [
            'name' => ['required', 'string', 'max:30'],
            'phone' => ['required', 'numeric', 'unique:users', 'digits_between:9,14'],
            'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
            'password' => $this->passwordRules(),
            'terms' => Jetstream::hasTermsAndPrivacyPolicyFeature() ? ['required', 'accepted'] : '',
        ])->validate();
        $user = User::create([
            'name' => $input['name'],
            'phone' => $input['phone'], 
            'email' => $input['email'],
            'password' => Hash::make($input['password']),
        ]);
        // Role
        $role = \App\Models\Role::select('id')->where('name', 'user')->first();
        $user->roles()->attach($role);
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
        return $user;
    }
}
