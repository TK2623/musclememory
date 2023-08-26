<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>体重登録</title>
    </head>
    
    <body>
        
        <p>現在の体重と目標の体重を登録してください。</p>
        
        {{-- route()関数は名前付きルートを指定 --}}
        <form action="{{ route('weights.register') }}" method="post" enctype="multipart/form-data">

            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            
            <div class="form-group row">
                <label class="col-md-2">名前</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="name">{{ old('name') }}</textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-2">身長</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="height">{{ old('height') }}</textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-2">現在の体重</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="current_weight">{{ old('current_weight') }}</textarea>
                </div>
            </div>
            
            <div class="form-group row">
                <label class="col-md-2">目標の体重</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="target_weight">{{ old('target_weight') }}</textarea>
                </div>
            </div>
            
            {{-- フォームで送られたidをhidden属性で送信する（ユーザーに値を入力させずに送信する）--}}
            <input type="hidden" name="user_id" value="{{ $id }}">
            @csrf
            <input type="submit" class="btn btn-primary" value="登録">
            
        </form>
        
    </body>

</html>
