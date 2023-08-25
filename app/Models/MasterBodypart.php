<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBodypart extends Model
{
    use HasFactory;
    
    // MasterBodypart Modelに関連付けを行う
    public function trainingprograms()
    {
        return $this->hasMany('App\Models\MasterTrainingprogram');
    }
}
