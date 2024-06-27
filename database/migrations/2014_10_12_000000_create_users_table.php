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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('position'); //役職
            $table->string('depertment'); //部署
            $table->string('team'); //チーム
            $table->string('email')->unique(); //初期流用
            $table->timestamp('email_verified_at')->nullable(); //初期流用 必要？
            $table->string('password'); //初期流用
            $table->rememberToken(); //初期流用 必要？
            $table->timestamps(); //初期流用
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
