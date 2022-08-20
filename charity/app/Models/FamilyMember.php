<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FamilyMember extends Model
{
    use SoftDeletes;
    protected  $fillable = [
        'first_name', 'last_name', 'father_name','phone_number'
         ,'date_birth', 'gender', 'age', 'job',
          'image', 'description', 'needy_people_id', 'relationship_id'
    ];

    private $dir = 'backend/img/family_member/';

    // find the needy person belongs to this family Member
    public function needy_people(){
        return $this->belongsTo('App\NeedyPeople');
    }

    // find the relationship for the family member
    public function relationship(){
        return $this->belongsTo(Relationship::class);
    }


    public function gender(){
        if ($this->gender == 0) {
            echo 'Male';
        } elseif ($this->gender == 1) {
            echo 'Female';
        } else {
            echo '<span class="label label-danger">Not Available</span>';
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


    public function getImageAttribute($image){
        return $this->dir . $image;
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
