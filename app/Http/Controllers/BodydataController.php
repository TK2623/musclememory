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
        return view('weights.weight_record');
    }
    
    
    public function create(Request $request) {

        // フォームから送られたデータが正しいかどうか判定するためValidationを行う
        $this->validate($request, Bodydata::$rules);
        
        $body_data = new Bodydata;
        $form = $request->all();
        
        if (isset($form['image'])) {
            
            // file関数で画像ファイルのフルパスを取得する。store関数でファイル名だけを取り出す。ファイル名を$pathに入れる。
            $path = $request->file('image')->store('public/image');
            
            // 画像のファイル名をimage_pathに入れる。
            $body_data->image_path = basename($path);
            
        } else {
            
            // 画像が送られなければimage_pathにnullを入れる。
            $body_data->image_path = null;
            
        }
        
        // フォームから送信された_tokenを削除する
        unset($form['_token']);
        // フォームから送信されたimageを削除する
        unset($form['image']);
        
        // データベースに保存する
        $body_data->fill($form);
        $body_data->save();
        
        return redirect('weights.weight_record', ['body_data' => $body_data]);
    }
    
}
