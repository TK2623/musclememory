<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bodydatas', function (Blueprint $table) {
            //create_bodydatas_table カラム追加
            // 画像のパスを保存するカラム nullableは値が空でも登録できる
            $table->string('image_path')->nullable()->after('target_weight');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bodydatas', function (Blueprint $table) {
            //ロールバックした時の処理
            $table->dropColumn('image_path');
        });
    }
};
