<?php

namespace App\Http\Controllers\Member;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberLoginController extends Controller
{
    
    public function index(){
        return view('login.index');
    }
    
    public function login(Request $request) {
        
        $credentials = $request->only(['email', 'password']);
        $gurad = $request->guard;
        
        if (Auth::guard('menbers')->attempt($credentials)) {
            
            // ログインしたらトップページにリダイレクト
            // route()ルーティングで設定したnameと合わせるとそこのURLに飛ぶ
            // with()セッションデータを格納しつつリダイレクトができる。リダイレクトした先でMSGを表示できる。
            return redirect()->route('index')->with([
                'login_msg' => 'ログインしました。',
            ]);
        }
        
        return back()->withErrors([
            'login' => ['ログインに失敗しました。'],
        ]);
        
    }
    
    public function logout(Request $request) {
        
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        
        // ログアウトしたらログインフォームにリダイレクト
        return redirect('login.index')->with([
            'auth' => ['ログアウトしました。'],
        ]);
        
    }
    
}
