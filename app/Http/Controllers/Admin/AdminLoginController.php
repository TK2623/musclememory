<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{
    
    public function index() {
        return view('admin.login.index');
    }
    
    public function login(Request $request) {
        
        // only:リクエストの中身をまとめて取得できる。どのパラメータを取るかわかりやすい。コンパクトに記述できる。
        $credentials = $request->only(['userid', 'password']);
        
        
        if (Auth::guard('administrators')->attempt($credentials)) {
            
            // ログインしたら管理画面トップにリダイレクト
            return redirect()->route('admin.index')->with([
                'login_msg' => 'ログインしました。',    
            ]);
            
        }
        
        return back()->withErrors([
            'login' => ['ログインに失敗しました。'], // この内容がビューの$messageに展開
        ]);
        
    }
    
    public function logout(Request $request) {
        
        // ユーザーのセッションから認証情報が削除され、以降のリクエストが認証されなくなる
        Auth::logout();
        // sessionを破棄
        $request->session()->invalidate();
        // サーバーに保存されているトークンを再生成することにより、2回目以降のリクエストは送信されたトークンチェックが不一致となり、正規のリクエストと見做さないような処理をする
        $request->session()->regenerateToken();
        
        // ログアウトしたらログインフォームにリダイレクト
        return redirect()->route('admin.login.index')->with([
            'logout_msg' => 'ログアウトしました。',
        ]);
    }

}
