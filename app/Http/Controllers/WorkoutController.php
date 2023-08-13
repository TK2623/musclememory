<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bodydata;

class WorkoutController extends Controller
{
    // 登録されている筋トレ種目を表示する
    public function worklist(Request $request)
    {
        // 認証しているユーザーのIDを取得
        $id = Auth::id();
        
        // ユーザーのIDに一致するデータを取得
        $body_data = Bodydata::where('user_id', $id)->first();
        
        return view('workouts.list', ['body_data' => $body_data]);
    }
    
    // public function list(Request $request)
    // {
    //     return view('workouts.list');
    // }
}
