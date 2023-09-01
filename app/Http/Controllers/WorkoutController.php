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
    
    // 筋トレの記録を追加
    public function add_workout_record(Request $request)
    {
        
        // フォームから送信されたデータを格納
        $workout_data_form = $request->all();
        
        $add_data = new Workout();
        
        // フォームから送信された_tokenを削除する
        unset($workout_data_form['_token']);
        
        // データベースに保存する
        // $add_data->master_training_programs_id = $workout_data_form['id'];
        $add_data->weights = $workout_data_form['weights'];
        $add_data->reps = $workout_data_form['reps'];
        $add_data->timestamps = now();
        $add_data->save();
        
        // idから種目名を取得
        $data = MasterTrainingProgram::find($request->id);
        dd($data);
        
        // 種目の今までの履歴を取得
        $workout_history = MasterTrainingProgram::user()->workOuts();
        dd($workout_history);
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
