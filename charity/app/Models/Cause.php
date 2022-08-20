<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cause extends Model
{
    use HasFactory;
    protected $fillable = ['cause_title', 'cause_goal', 'cause_raised', 'cause_description'];

}
