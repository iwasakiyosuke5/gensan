<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('generates', function (Blueprint $table) {
            $table->increments('idAI'); //AIが生成した際に付与されるID番号（オート）
            $table->text('generatedImprovement'); //AIが回答した改善方法
            $table->text('expectedEffect'); //上記の期待される効果
            $table->unsignedBigInteger('user_id'); //;ログインしているユーザーのIDを保存するカラム
            $table->timestamps();

            // 外部キー制約 (usersテーブルのidカラムを参照)
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
    
     */
    public function down(): void
    {
        Schema::dropIfExists('generates');
    }
};