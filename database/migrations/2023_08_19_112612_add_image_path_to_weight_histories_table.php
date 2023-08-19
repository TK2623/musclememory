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
        Schema::table('weight_histories', function (Blueprint $table) {
            //create_weight_histories_table カラム追加
            // 画像のパスを保存するカラム nullableは値が空でも登録できる
            $table->string('image_path')->nullable()->after('weight_history');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('weight_histories', function (Blueprint $table) {
            //
        });
    }
};
