<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdministratorsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('administrators', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('userid')->unique();
            $table->timestamp('userid_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->text('extra_administrators_column1')->nullable()->comment('追加カラム1');
            $table->text('extra_administrators_column2')->nullable()->comment('追加カラム2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('administrators');
    }
};
