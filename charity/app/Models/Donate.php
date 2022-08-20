<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Donate extends Model
{
    use SoftDeletes;
    protected $fillable = ['user_id', 'donation_type_id', 'donation_amount', 'donation_date', 'donation_delivery', 'needy_people_id', 'description','currency' ,'donation_box_id', 'donation_location'];

    // find the donator from user table
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function donation_type()
    {
        return $this->belongsTo(DonationType::class);
    }

    public function needy_people()
    {
        return $this->belongsTo(NeedyPeople::class);
    }

    public function donation_box()
    {
        return $this->belongsTo(DonationBox::class);
    }

    public function help_from_donation_box()
    {
        if($this->donation_box_id == null){
            echo '<span class="label label-danger">Not Available</span>';
        }else{
            echo $this->donation_box_id;
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
