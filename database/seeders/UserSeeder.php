<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user_data = [];
        for ($i = 1; $i <= 2; $i++) {
            
            $user_data[] = [
                    
                    'name' => 'ダミー' . $i,
                    // sprintf(フォーマット,文字列1,…)：決められたフォーマットで文字列を生成する
                    // 「%」型指定子の先頭。「03」数字を3桁に揃える。「d」10進数の整数。
                    'email' => sprintf('user%02d@example.com',$i),
                    'password' => sprintf('pass%03d',$i),
                    
            ];
        }
        
        foreach($user_data as $data) {
            
            $user = new User();
            
            $user->name = $data['name'];
            $user->email = $data['email'];
            $user->password = Hash::make($data['password']);
            
            $user->save();
            
        }
    }
}
