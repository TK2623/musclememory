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
    
    public function weightrecord(Request $request)
    {
        // 認証しているユーザーのIDを取得
        $id = Auth::id();
        
        return view('weights.weight_record', ['id' => $id]);
    }
    
    
    public function create(Request $request) {
        
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
        // dd($body_data);
        // データベースに保存する
        $body_data->fill($body_data_form)->save();
        
        return view('weights.weight_line_chart', ['body_data' => $body_data]);
    }
    
}
