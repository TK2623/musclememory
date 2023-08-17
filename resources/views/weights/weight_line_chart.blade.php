<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>体重</title>
    </head>
    
    <body>
        <h2>目標の体重　{{ $body_data->target_weight }}</h2>
        
        <h2>現在の体重　{{ $body_data->current_weight }}</h2>
        <a href="{{ url('/weights/record') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">＋</a>
        
    
    </body>

</html>
