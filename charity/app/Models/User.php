<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Collective\Html\Eloquent\FormAccessible;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $dir = 'backend/img/users/';

    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'phone_number', 'hometown', 'current_address',  'date_birth', 'gender', 'description', 'email_verified_at', 'phone_verified_at', 'status', 'image', 'role_id',
    ];


    /**
     * The attributes that should be hidden for arrays.
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
     * The attributes that should be cast to native types.
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
    protected $appends = [
        'profile_photo_url',
    ];

    // public static function rules($id=0, $merge=[])
    // {
    //     return array_merge([
    //         'first_name' => 'required|max:45',
    //         'last_name' => 'required',
    //         'email' => 'required|email|unique:users'. ($id ? ",id,$id":''),
    //         'password' => 'required|',
    //         'phone_number'=> 'unique:users'. ($id ? ",id,$id":''),
    //         'gender' => 'required|max:2|min:0',
    //         'date_birth' => 'date',
    //         'status' => 'required|max:1|min:0',
    //         'hometown' => 'max:255|string',
    //         'current_address' => 'max:255|string',
    //         'image' => 'mimes:png,jpg,jpeg',
    //         'description' => 'max:500|string',
    //         'role_id'=> 'required|numeric|max:20',
    //         'email_verified_at' => 'date',
    //         'phone_verified_at' => 'date',
    //         'remember_token' => 'max:100',         
    //     ],
    //         $merge);
    // }
    // use for to set the images folder

    public function donate()
    {
        return $this->hasMany(Donate::class);
    }

    public function monthly_donates()
    {
        return $this->hasMany(MonthlySponsor::class);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function needy_people()
    {
        return $this->hasMany(NeedyPeople::class);
    }

  
    public function blog()
    {
        return $this->hasMany(Blog::class);
    }

    public function donation_box()
    {
        return $this->hasMany(DonationBox::class);
    }

    public function getImageAttribute($image)
    {
        return $this->dir . $image;
    }

    public function gender()
    {
        if ($this->gender == 0) {
            echo 'Male';
        } elseif ($this->gender == 1) {
            echo 'Female';
        } else {
            echo 'Gender is not Define';
        }
    }

    public function status()
    {
        if ($this->status == 1) {
            echo '<span class="label label-success">Active</span>';
        } else {
            echo '<span class="label label-danger">Not Active</span>';
        }
    }

    
    public function show_value($value)
    {
        if ($value == null) {
            echo '<span class="label label-danger">Not Available</span>';
        }else{
            echo $value;
        }
    }

    public function verified($verified)
    {
        if ($verified != null) {
            echo '<span class="label label-success">Verified</span>';
        } else {
            echo '<span class="label label-danger">Not Verified</span>';
        }
    }

    public function setFirstNameAttribute($value){
        $this->attributes['first_name'] = ucfirst($value);
    }
    public function setLastNameAttribute($value){
        $this->attributes['last_name'] = ucfirst($value);
    }
}
