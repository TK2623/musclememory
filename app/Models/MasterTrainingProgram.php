<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterTrainingProgram extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    public static $rules = array(
        'training_program' => 'required',
    );
    
    public function bodyPart()
    {
        return $this->belongsTo('App\Models\MasterBodypart', 'master_bodypart_id');
    }
    
}
