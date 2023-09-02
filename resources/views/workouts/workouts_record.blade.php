<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>トレーニング記録</title>
    </head>
    
    <body>
        
        <h2>種目 {{ $data->name }}</h2>
        
        <form action="{{ route('workouts.add.record') }}" method="post" enctype="multipart/form-data">
            
            @if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                        <li>{{ $e }}</li>
                    @endforeach
                </ul>
            @endif
            
            {{--<input type="hidden" name="master_training_programs_id" value="{{ $id->workOuts }}">--}}
            
            <div class="form-group row">
                <label class="col-md-2">日付</label>
                <div class="col-md-10">
                    {{ \Carbon\Carbon::now()->format("Y/m/d H:i") }}
                </div>
            </div>
            
            @for ($i=1; $i<=5; $i++)
            
                {{-- セット数 --}}
                <div class="form-group row">
                    <label class="col-md-2">{{ $i }}set</label>
                    <div class="col-md-10">
                        
                    </div>
                </div>
                
                {{-- 重量を入力 --}}
                <div class="form-group row">
                    <label class="col-md-2">重量</label>
                    <div class="col-md-10">
                        <input type="text" name="weights[]" value="" size="10" placeholder="0"> kg
                    </div>
                </div>
                
                {{-- 回数を入力 --}}
                <div class="form-group row">
                    <label class="col-md-2">回数</label>
                    <div class="col-md-10">
                        <input type="text" name="reps[]" value="" size="10" placeholder="0"> 回
                    </div>
                </div>
                
            @endfor
            
            @csrf
            <input type="submit" class="btn btn-primary" value="完了">
            
        </form>
        
        
    </body>

</html>
