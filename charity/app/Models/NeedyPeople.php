<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NeedyPeople extends Model
{
    use SoftDeletes;
    

    protected  $fillable = [
        'first_name', 'last_name', 'father_name','phone_number',
         'hometown', 'current_address','date_birth', 'gender', 'age',
          'image', 'id_card_number','predictive_needs', 'needy_percentage', 'description', 'person_type_id', 'user_id'
    ];

    protected $dir = 'backend/img/needy/';

    // using this we can find person Type ex: widow, orphan etc
    public function person_type()
    {
        return $this->belongsTo(PersonType::class);
    }

    // find the family members of needy person
    public function family_members()
    {
        return $this->hasMany(FamilyMember::class);
    }

    public function donate()
    {
        return $this->hasMany(Donate::class);
    }

    public function monthly_sponsor()
    {
        return $this->hasMany(MonthlySponsor::class);
    }

    // find the user  who register this person
    public function user()
    {
        return $this->belongsTo(User::class);
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

    public function needs_percentage_bar()
    {
        if ($this->needy_percentage <= 30) {
            echo    '<div class="progress progress-xs">';
            echo        '<div class="progress-bar progress-bar-success" style="width:' . $this->needy_percentage . '%">';
            echo        '</div>';
            echo    '</div>';
        } elseif ($this->needy_percentage <= 60) {
            echo    '<div class="progress progress-xs">';
            echo        '<div class="progress-bar progress-bar-yellow" style="width:' . $this->needy_percentage . '%">';
            echo        '</div>';
            echo    '</div>';
        }else{
            echo    '<div class="progress progress-xs">';
            echo        '<div class="progress-bar progress-bar-danger" style="width:' . $this->needy_percentage . '%">';
            echo        '</div>';
            echo    '</div>';
        }
    }

    public function needs_percentage_label(){
        if($this->needy_percentage <= 30){
            echo '<span class="badge bg-green">' . $this->needy_percentage . '%</span>';
        }elseif($this->needy_percentage <= 60){
            echo '<span class="badge bg-yellow">' . $this->needy_percentage . '%</span>';
        }else{
            echo '<span class="badge bg-red">' . $this->needy_percentage . '%</span>';
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


    public function setFirstNameAttribute($value){
        $this->attributes['first_name'] = ucfirst($value);
    }
    public function setLastNameAttribute($value){
        $this->attributes['last_name'] = ucfirst($value);
    }
    public function setFatherNameAttribute($value){
        $this->attributes['father_name'] = ucfirst($value);
    }
}
