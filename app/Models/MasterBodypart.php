<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterBodypart extends Model
{
    use HasFactory;
    
    // 部位（主）に対し、複数の種目（従）を持つ
    public function trainingPrograms()
    {
        return $this->hasMany('App\Models\MasterTrainingProgram');
    }
}
