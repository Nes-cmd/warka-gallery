<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable// implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = ['name','phone','email','password', 'profile_photo_path'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    // protected $appends = [
    //     'profile_photo_url',
    // ];
    public function roles()
    {
        return $this->belongsToMany(\App\Models\Role::class);
    }

    public function hasRole($role)
    {
        if ($this->roles()->where('name', $role)->first()) {
            return true;
        }
        return false;
    }
    public function hasAnyRole($roles)
    {
        if ($this->roles()->whereIn('name', $role)->first()) {
            return true;
        }
        return false;
    }
    public function photos()
    {
        return $this->hasMany(\App\Models\Photo::class);
    }
    public function otherFiles()
    {
        return $this->hasMany(\App\Models\OtherFile::class);
    }
    public function categories()
    {
        return $this->hasMany(\App\Models\Category::class);
    }
    public function paymentProcesses()
    {
         return $this->hasOne(\App\Models\PaymentProcess::class);
    }
    public function settings()
    {
         return $this->belongsToMany(\App\Models\Setting::class);
    }
    public function defaultSetting()
    {
        return $this->hasMany(\App\Models\DefaultSetting::class);
    }
    public function isProUser()
    {
        $payment = \App\Models\Payment::where('user_id', auth()->user()->id)->first();
        $next_payment = $payment? $payment->next_payment_at - time() : 0; 
        return ($next_payment > 0);
    }
    
}
