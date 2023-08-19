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
        
        <h2>グラフ</h2>
        
        <h2>記録</h2>
        
        @foreach($posts as $post)
            
            <div class="text col-md-6">
                
                <div class="date">
                    {{ $post->updated_at->format('Y年m月d日') }}
                </div>
                
                <div class="weight">
                    {{ '体重：' . $post->weight_history . 'kg' }}
                </div>
                
                <div class="image-position">                                
                    <div class="image">
                        
                        <!--画像がセットされているか確認-->
                        @if(isset($post->image_path))
                            <!--画像がセットされている場合-->
                            {{--secure_asset()「publicディレクトリ」のパスを返す関数。「.」は文字列結合する演算子。ここで画像のフルパスを指定している。--}}
                            <img src="{{ secure_asset('storage/image/' . $post->image_path) }}">
                        @endif
                            
                    </div>
                </div>
                
                <div class="delete">
                    <a href="{{ route('weights.delete', ['id' => $post->id]) }}">削除</a>
                </div>
                <br>
                    
            </div>
                            
        @endforeach
    
    </body>

</html>
