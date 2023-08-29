<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\MasterBodypart;
use App\Models\MasterTrainingProgram;
use App\Models\Workout;

class WorkoutController extends Controller
{
    // 登録されている筋トレ種目を表示する
    public function workout_list(Request $request)
    {
        // 筋トレの部位を取得
        $workout_list = MasterBodypart::all();
        
        return view('workouts.list', ['workout_list' => $workout_list]);
    }
    
    // workouts_recordを表示
    public function workout_record(Request $request)
    {
        
        // 筋トレの部位を取得
        $workout_list = MasterBodypart::all();
        
        // idから種目名を取得
        $data = MasterTrainingProgram::find($request->id);
        
        // 種目の今までの履歴を取得
        
        
        return view('workouts.workouts_record', ['workout_list' => $workout_list, 'data' => $data]);
    }
    
    // 部位データをviewに渡す。add_training_programを表示
    public function add_training_program(Request $request)
    {

        // 筋トレの部位を取得
        $workout_list = MasterBodypart::all();
        
        return view('workouts.add_training_program', ['workout_list' => $workout_list]);

    }
    
    // 筋トレ種目追加
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
