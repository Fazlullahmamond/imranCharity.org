<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlySponsor extends Model
{
    use HasFactory;

    protected $fillable = [ 'duration','user_id', 'monthly_amount', 'needy_people_id', 'description'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function needy_people()
    {
        return $this->belongsTo(NeedyPeople::class);
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
