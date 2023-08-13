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
        Schema::create('workout_lists', function (Blueprint $table) {
            
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('chest');
            $table->string('shoulder');
            $table->string('back');
            $table->string('arm');
            $table->string('abdominal');
            $table->string('leg');
            $table->string('other');
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
        Schema::dropIfExists('workout_lists');
    }
};
