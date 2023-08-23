<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MasterBodypart;

class WorkoutController extends Controller
{
    // 登録されている筋トレ種目を表示する
    public function workoutlist(Request $request)
    {
        // 筋トレの部位を取得
        $workout_list = MasterBodypart::all();
        
        return view('workouts.list', ['workout_list' => $workout_list]);
    }
    
    public function workoutrecord(Request $request)
    {
        // 認証しているユーザーのIDを取得
        $id = Auth::id();
        
        return view('workouts.workouts_record', ['id' => $id]);
    }
    
    public function add_training_program(Request $request)
    {
        // 認証しているユーザーのIDを取得
        $id = Auth::id();
        
        return view('workouts.add_training_program', ['id' => $id]);
    }
}
