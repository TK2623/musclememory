<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    use HasFactory;
    
    protected $guarded = array('id');
    
    protected $casts = [
        'weights' => 'json',
        'reps' => 'json',
    ];
    
    protected $fillable = [
        'id',
        'master_training_programs_id',
        'weights',
        'reps',
    ];
    
}
