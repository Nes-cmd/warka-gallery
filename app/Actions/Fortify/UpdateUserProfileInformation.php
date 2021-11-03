<?php

namespace App\Actions\Fortify;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Fortify\Contracts\UpdatesUserProfileInformation;
use App\CustomClases\ImageFilter;

class UpdateUserProfileInformation implements UpdatesUserProfileInformation
{
    /**
     * Validate and update the given user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    public function update($user, array $input)
    {
        Validator::make($input, [
            'name' => ['required', 'string', 'max:30'],
            'phone' => ['required', 'numeric', 'digits_between:9,14', Rule::unique('users')->ignore($user->id)],
            'email' => ['required', 'email', 'max:50', Rule::unique('users')->ignore($user->id)],
            'photo' => ['nullable', 'mimes:jpg,jpeg,png', 'max:2048'],
        ])->validateWithBag('updateProfileInformation');

        if (isset($input['photo'])) {
            $img = \Image::make($input['photo'])->encode('jpeg');
            $img = $img->filter( new ImageFilter());
            $name = 'profile-photos/'.$input['photo']->getClientOriginalName().\Carbon\Carbon::now()->format('Y-m-d-h-i-s').'.jpeg';
            \Storage::put($name, $img);
            $user->profile_photo_path = $name;
            //$user->updateProfilePhoto($input['photo']);
        }

        if($input['email'] !== $user->email &&
            $user instanceof MustVerifyEmail) {
            $this->updateVerifiedUser($user, $input);
        } else {
            $user->forceFill([
            'name' => $input['name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            ])->save();
        }
    }

    /**
     * Update the given verified user's profile information.
     *
     * @param  mixed  $user
     * @param  array  $input
     * @return void
     */
    protected function updateVerifiedUser($user, array $input)
    {
        $user->forceFill([
            'name' => $input['name'],
            'phone' => $input['phone'],
            'email' => $input['email'],
            'email_verified_at' => null,
        ])->save();

        $user->sendEmailVerificationNotification();
    }
}
