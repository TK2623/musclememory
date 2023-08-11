<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>mypage</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    
    <body class="antialiased">
            
        <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
            
            <!--ルーティングにloginが含まれるなら-->
            @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a href="{{ url('/workouts') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">筋トレ</a>
                        <a href="{{ url('/weights/index') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">体重記録</a>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">ログイン</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">新規登録</a>
                        @endif
                    @endauth
                </div>
            @endif
        
        <h1>マイページ</h1>
        
        <h2>現在の体重　{{ $body_data->current_weight }}</h2>
        <h2>目標の体重　{{ $body_data->target_weight }}</h2>
        
        <form action="{{ route('logout') }}" method="post" class="text-sm text-gray-700 dark:text-gray-500 underline">
            @csrf
            <input type="submit" value="ログアウト">
        </form>
        
        </div>
        
        
            

    </body>
    
</html>
