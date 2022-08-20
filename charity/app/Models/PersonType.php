<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonType extends Model
{
    use HasFactory;
    protected $fillable= ['name', 'description'];
    // find all needy_people whose are belongs to this person type
    public function needy_people()
    {
        return $this->hasMany(NeedyPeople::class);
    }


    public function show_value($value)
    {
        if ($value == null) {
            echo '<span class="label label-danger">Not Available</span>';
        }else{
            echo $value;
        }
    }
}
