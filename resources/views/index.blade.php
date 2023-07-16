<html>
    
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    
    <body>
        
        <div clss="container">
            
            <h1>トップページ</h1>    
            
            @if (session('login_msg'))
                <div class="alert alert-success">
                    {{ session('login_msg') }}
                </div>
            @endif
            
            @if (Auth::guard('members')->check())
                <div>ユーザーID {{ Auth::guard('members')->user()->userid }}でログイン中</div>
            @else
                <div>ログインしていません。</div>
            @endif
            
            <ul>
                <li>ログイン状態：{{ Auth::check() }}</li>
                <li>管理者（Admin）ログイン状態：{{ Auth::guard('administrators')->check() }}</li>
                <li>会員（members）ログイン状態：{{ Auth::guard('members')->check() }}</li>
            </ul>
            
            <div>
                <a href="/logout">ログアウト</a>
            </div>
            
            
        </div>

    </body>
    
</html>
