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
        Schema::create('kaizen_proposals', function (Blueprint $table) {
            $table->increments('idKP'); // 最終登録した提案書に対してのID番号（オートインクリメント）
            $table->text('title');
            $table->text('currentSituation'); // 現状
            $table->text('proposal'); // 登録した改善方法
            $table->text('benefit'); // 登録した期待される効果
            $table->text('budget')->nullable(); // 予算（文章も含む）
            $table->unsignedBigInteger('user_id'); // ログインしているユーザーのIDを保存するカラム
            $table->string('position'); // 役職
            $table->string('department'); // 部署
            $table->string('team'); // チーム
            $table->string('approvalStage'); // 承認段階
            $table->text('bossComment')->nullable(); // コメント
            $table->unsignedInteger('goodCounts')->default(0); // 良いね！の数(初期値は0)
            $table->timestamps();

            // 外部キー制約
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kaizen_proposals');
    }
};
