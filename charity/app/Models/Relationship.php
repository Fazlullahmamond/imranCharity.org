<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Relationship extends Model
{
    use HasFactory;
    protected $fillable= ['name', 'description'];

    //
    public function family_member()
    {
        return $this->hasMany(FamilyMember::class);
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
