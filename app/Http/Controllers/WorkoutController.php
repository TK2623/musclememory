<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\WorkoutList;

class WorkoutController extends Controller
{
    // 登録されている筋トレ種目を表示する
    public function workoutlist(Request $request)
    {
        // 認証しているユーザーのIDを取得
        $id = Auth::id();
        
        // ユーザーのIDに一致するデータを取得
        $workout_list = WorkoutList::where('user_id', $id)->first();
        
        return view('workouts.list', ['workout_list' => $workout_list]);
    }
    
}
