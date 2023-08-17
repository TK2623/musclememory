<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>体重記録</title>
    </head>
    
    <body>
        
        <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                
                <h2>体重記録</h2>
                
                {{-- route()関数は名前付きルートを指定 --}}
                <form action="{{ route('weights.create') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    
                    <div class="form-group row">
                        <label class="col-md-2">日付</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="date" value="{{ old('') }}">
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">体重</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="body" rows="20">{{ old('current_weight') }}</textarea>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label class="col-md-2">画像</label>
                        <div class="col-md-10">
                            <input type="file" class="form-control-file" name="image">
                        </div>
                    </div>
                    
                    @csrf
                    <input type="submit" class="btn btn-primary" value="登録">
                    
                </form>
            </div>
        </div>
    </div>
        
    </body>

</html>
