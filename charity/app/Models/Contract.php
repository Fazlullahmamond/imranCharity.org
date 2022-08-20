<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = ['contract_title', 'contract_with', 'contract_startDate', 'contract_endDate', 'description'];

}
