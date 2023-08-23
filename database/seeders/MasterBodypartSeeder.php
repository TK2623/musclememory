<?php

namespace Database\Seeders;

use App\Models\MasterBodypart;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MasterBodypartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        $columns = collect(['id', 'name', 'created_at']);
        $values = collect([
            
            [1, '胸', now()],
            [2, '肩', now()],
            [3, '背中', now()],
            [4, '腕', now()],
            [5, '脚', now()],
            [6, '腹筋', now()],
            [7, 'その他', now()],
            
        ]);
        
        // map() コレクション全体を繰り返し処理し、設定した処理を元のコレクションの全要素に適用する。設定した処理に値が更新されコレクションに格納される
        // combine() コレクションの値をキーとして、他の配列かコレクションの値を結合する
        // toArray() コレクションを配列に変換する
        $rows = $values->map(fn($x) => $columns->combine($x))->toArray();
        
        DB::connection()->table('master_bodyparts')->insert($rows);
        
    }
}
