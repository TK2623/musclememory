<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightHistory extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');

    public static $rules = array(
        'user_id' => 'required',
        'weight_history' => 'required',
    );
}
