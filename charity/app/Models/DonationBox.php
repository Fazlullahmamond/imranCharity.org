<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DonationBox extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'location', 'user_id', 'status', 'description'];

    //  find the user whose register donation box
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function donate()
    {
        return $this->hasMany(Donate::class);
    }

    public function status(){
        if($this->status == 1){
            echo '<span class="label label-success">Active</span>';
        }else{
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
}
