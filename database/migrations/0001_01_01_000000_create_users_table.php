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
            $table->id()->comment('ユーザーID');
            $table->string('name')->comment('ユーザー名');
            $table->string('memo')->nullable()->comment('備考');
            $table->timestamp('created_at')->useCurrent()->nullable()->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->comment('更新日時');
        });

        Schema::create('events', function (Blueprint $table) {
            $table->id()->comment('イベントID');
            $table->string('event_name')->comment('イベント名');
            $table->dateTime('date')->comment('開催日時');
            $table->timestamp('created_at')->useCurrent()->nullable()->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->comment('更新日時');
        });

        Schema::create('users_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('event_id')->comment('イベントID');
            $table->integer('user_id')->comment('ユーザーID');
            $table->timestamp('created_at')->useCurrent()->nullable()->comment('作成日時');
            $table->timestamp('updated_at')->nullable()->comment('更新日時');
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('events');
        Schema::dropIfExists('users_plans');
        Schema::dropIfExists('sessions');
    }
};
