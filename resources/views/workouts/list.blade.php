<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>筋トレ種目</title>
</head>

<body>
    <li>
        <ul>
            胸：{{ $workout_list->chest }}
        </ul>
        <ul>
            肩：{{ $workout_list->shoulder }}
        </ul>
        <ul>
            背中：{{ $workout_list->back }}
        </ul>
        <ul>
            腕：{{ $workout_list->arm }}
        </ul>
        <ul>
            脚：{{ $workout_list->leg }}
        </ul>
        <ul>
            腹筋：{{ $workout_list->abdominal }}
        </ul>
        <ul>
            その他：{{ $workout_list->other }}
        </ul>
    </li>

</body>

</html>
