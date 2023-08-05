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
        Schema::create('meals', function (Blueprint $table) {
            
            $table->id();
            // foreignId():userテーブルのidを参照する。（紐づける）
            // constrained():参照先のテーブル・カラム名を指定できる
            // cascadeOnDelete():参照元のデータ(userテーブルのid)が削除されたとき、参照先(bodydatas)に反映される。
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('target_calorie');
            $table->integer('intake_calorie');
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('meals');
    }
};
