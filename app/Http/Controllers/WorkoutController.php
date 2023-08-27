<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MasterBodypart;
use App\Models\MasterTrainingProgram;

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
        return view('workouts.workouts_record');
    }
    
    public function add_training_program(Request $request)
    {

        // 筋トレの部位を取得
        $workout_list = MasterBodypart::all();
        
        return view('workouts.add_training_program', ['id' => $id, 'workout_list' => $workout_list]);

    }
    
    public function create(Request $request) {
        
        // フォームから送られたデータが正しいかどうか判定するためValidationを行う
        $this->validate($request, MasterTrainingProgram::$rules);
        
        // フォームから送信されたデータを格納
        $add_data = new MasterTrainingProgram();
        $add_data->master_bodypart_id = (int)$request['bodypart'];  // 文字列で送られるのでintに型変換
        $add_data->name = $request['training_program'];
        $add_data->timestamps = now();
        
        // フォームから送信された_tokenを削除する
        unset($add_data['_token']);
        
        // データベースに保存する
        $add_data->save();
        
        return redirect()->route('workouts.list');
        
    }
}
