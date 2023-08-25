<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>種目追加</title>
    </head>
    
    <body>
        
        <h2>種目追加</h2>
        
        <form action="{{ route('workouts.create') }}" method="post" enctype="multipart/form-data">
            
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            
            {{-- 登録する種目の部位をプルダウンで表示 --}}
            <div class="form-group row">
                <label class="col-md-2">部位</label>
                <div class="col-md-10">
                    <select name="bodypart">
                        
                        {{-- 部位を出力 --}}
                        @foreach($workout_list as $part)
                            
                            <option value={{ $part->id }}>{{ $part->name }}</option>
                            
                        @endforeach
                        
                    </select>
                </div>
            </div>
            
            {{-- 追加する種目名をテキストで入力 --}}
            <div class="form-group row">
                <label class="col-md-2">種目名</label>
                <div class="col-md-10">
                    <textarea class="form-control" name="training_program">{{ old('training_program') }}</textarea>
                </div>
            </div>
            
            {{--<input type="hidden" name="id" value="{{ $part->id }}">--}}
            @csrf
            <input type="submit" class="btn btn-primary" value="追加">
        
        </form>
        
    </body>

</html>
