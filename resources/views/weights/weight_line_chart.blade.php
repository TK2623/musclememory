<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>体重記録</title>
</head>

<body>
    <h2>現在の体重　{{ $body_data->current_weight }}</h2>
    <h2>目標の体重　{{ $body_data->target_weight }}</h2>

</body>

</html>
