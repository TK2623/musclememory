<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bodydata;

class BodydataController extends Controller
{
    
    // マイページにユーザーの体重を表示する
    public function index(Request $request)
    {
        // 認証しているユーザーのIDを取得
        $id = Auth::id();
        
        // ユーザーのIDに一致するデータを取得
        $body_data = Bodydata::where('user_id', $id)->first();
        
        return view('mypage', ['body_data' => $body_data]);
    }
    
    // 体重記録ページにユーザーの体重を表示する
    public function weightlinechart(Request $request)
    {
        // 認証しているユーザーのIDを取得
        $id = Auth::id();
        
        // ユーザーのIDに一致するデータを取得
        $body_data = Bodydata::where('user_id', $id)->first();
        
        return view('weights.weight_line_chart', ['body_data' => $body_data]);
    }
    
}
