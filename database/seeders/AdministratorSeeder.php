<?php

namespace Database\Seeders;

use App\Models\Administrator;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AdministratorSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // テーブルを削除、再生成を行う
        Administrator::truncate();

        $administrators_data = [];
        
        for ($i = 1; $i <= 10; $i++) {
            
            $administrators_data[] = [
                
                // sprintf(フォーマット,文字列1,…)：決められたフォーマットで文字列を生成する
                // 「%」型指定子の先頭。「03」数字を3桁に揃える。「d」10進数の整数。
                'userid' => sprintf('admin%03d',$i),
                'password' => sprintf('pass%04d',$i),
                
            ];
            
        }
        
        foreach($administrators_data as $data) {
            
            $administrator = new Administrator();
            
            $administrator->userid = $data['userid'];
            $administrator->password = Hash::make($data['password']);
            
            $administrator->save();
            
        }
    }
}
