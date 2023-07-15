<?php

namespace Database\Seeders;

use App\Models\Member;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class MemberSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // テーブルを削除、再生成を行う
        Member::truncate();

        $member_data = [];
        for ($i = 1; $i = 10; $i++) {
            
            $member_data[] = [
                
                // sprintf(フォーマット,文字列1,…)：決められたフォーマットで文字列を生成する
                // 「%」型指定子の先頭。「03」数字を3桁に揃える。「d」10進数の整数。
                'email' => sprintf('member%02d@example.com',$i),
                'password' => sprintf('pass%04d',$i),
                
            ];
            
        }
        
        foreach($member_data as $data) {
            
            $member = new member();
            
            $member->email = $data['email'];
            $member->password = Hash::make($data['password']);
            
            $member->save();
            
        }
    }
}
