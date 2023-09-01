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
        Schema::table('workouts', function (Blueprint $table) {
            // weights,repsカラムをnullableに変更
            $table->DECIMAL('weights',5,3)->nullable(true)->change();
            $table->integer('reps')->length(3)->nullable(true)->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workouts', function (Blueprint $table) {
            // rollbackしたときは、nullableをfalseにする。(変更前のnullを許容しない状態に戻る)
            $table->DECIMAL('weights',5,3)->nullable(false)->change();
            $table->integer('reps')->length(3)->nullable(false)->change();
        });
    }
};
