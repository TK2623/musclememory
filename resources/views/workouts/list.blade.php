<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>筋トレ種目</title>
</head>

<body>
    
    <a href="{{ url('/workouts/training_programs') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">＋</a>
    
    <div class="workoutlist">
        
        {{-- 部位を出力 --}}
        @foreach($workout_list as $part)
            
            {{ $part->name }}
            
        @endforeach
        
    </div>

</body>

</html>
