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
        // MasterBodypartモデルを逆引きできる
        return $this->belongsTo('App\Models\MasterBodypart', 'master_bodypart_id');
    }
    
    public function workOut()
    {
        // 種目（主）に対し、複数の履歴（従）を持つ
        return $this->hasMany('App\Models\Workout');
    }
    
}
