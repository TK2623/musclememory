<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Bodydata;
use App\Models\WeightHistory;

class BodydataController extends Controller
{
    
    // マイページにユーザーの体重を表示する
    public function index(Request $request)
    {
        // 認証しているユーザーのIDを取得
        $id = Auth::id();
        
        // ユーザーのIDに一致するデータを取得
        $body_data = Bodydata::where('user_id', $id)->first();
        
        if(is_null($body_data))
        {
            // nullの場合→体重の登録
            return view('weights.weight_register', ['id' => $id]);
        }else{
            // mypageを表示
            return view('mypage', ['body_data' => $body_data]);
        }
        
    }
    
    // 初めてログインした人に情報を登録してもらう
    public function register(Request $request) 
    {
        
        // フォームから送られたデータが正しいかどうか判定するためValidationを行う
        $this->validate($request, Bodydata::$rules);

        // 認証しているユーザーのIDを取得
        $id = Auth::id();
        
        // フォームから送信されたデータを格納
        $body_data_form = $request->all();
        // dd($body_data_form);

        // フォームから送信された_tokenを削除する
        unset($body_data_form['_token']);
        
        // データが入っているか確認
        $body_data = Bodydata::firstOrNew(['user_id' => $request->user_id]);
        
        // データがなければ保存する
        if(!$body_data->exists)
        {
            // データベースに保存する
            $body_data->fill($body_data_form)->save();
        }
        
        return view('mypage', ['body_data' => $body_data]);
    }
    
    // 体重記録ページにユーザーの体重を表示する
    public function weightlinechart(Request $request)
    {
        // 認証しているユーザーのIDを取得
        $id = Auth::id();
        
        // IDに一致するデータを取得
        $body_data = Bodydata::where('user_id', $id)->first();
        
        // 体重履歴を取得
        $history = new WeightHistory();
        $posts = WeightHistory::all();
        
        // 履歴を降順に並べ替える
        $posts = WeightHistory::orderBy('created_at', 'desc')->get();
        
        return view('weights.weight_line_chart', ['body_data' => $body_data, 'posts' => $posts]);
    }
    
    //　体重記録ページを表示
    public function weightrecord(Request $request)
    {
        // 認証しているユーザーのIDを取得
        $id = Auth::id();
        
        return view('weights.weight_record', ['id' => $id]);
    }
    
    // 体重記録ページのフォームを登録
    public function create(Request $request) 
    {
        
        // フォームから送られたデータが正しいかどうか判定するためValidationを行う
        $this->validate($request, Bodydata::$rules);
        
        // IDに一致するデータを取得
        $body_data = Bodydata::find($request->id);
        
        // フォームから送信されたデータを格納
        $body_data_form = $request->all();
        
        // 画像が送信されたか判定
        if (isset($body_data_form['image'])) {
            
            // file関数で画像ファイルのフルパスを取得する。store関数でファイル名だけを取り出す。ファイル名を$pathに入れる。
            $path = $request->file('image')->store('public/image');
            
            // 画像のファイル名をimage_pathに入れる。
            $body_data_form['image_path'] = basename($path);
            
        } else {
            
            // 画像が送られなければimage_pathにnullを入れる。
            $body_data_form['image_path'] = null;
            
        }
        
        // フォームから送信された_tokenを削除する
        unset($body_data_form['_token']);
        // フォームから送信されたimageを削除する
        unset($body_data_form['image']);
        
        // データベースに保存する
        $body_data->fill($body_data_form)->save();
        
        
        // 履歴テーブルに格納する
        $history = new WeightHistory();
        $history->user_id = $body_data->id;
        $history->weight_history = $body_data->current_weight;
        $history->image_path = $body_data->image_path;
        $history->save();
        
        // 履歴を降順に並べ替える
        $posts = WeightHistory::orderBy('created_at', 'desc')->get();

        return view('weights.weight_line_chart', ['body_data' => $body_data, 'posts' => $posts]);
    }
    
    // 体重記録の履歴を削除
    public function delete(Request $request) 
    {
        
        $history = WeightHistory::find($request->id);
        
        $history->delete();
        
        return redirect('weights/');
        
    }
    
}
