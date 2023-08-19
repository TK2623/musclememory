<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bodydata extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'current_weight' => 'required',
    );
    
     // Bodydata Modelに関連付けを行う
    public function weight_histories()
    {
        return $this->hasMany('App\Models\WeightHistory');
    }
}
