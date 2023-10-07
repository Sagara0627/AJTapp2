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
        Schema::create('files', function (Blueprint $table) {
            $table->id();
            $table->string('genre', 255)->comment('ジャンル');
            $table->integer('genre_rank')->comment('ジャンル順位');
            $table->text('file_path')->comment('ファイルパス');
            $table->integer('file_type')->comment('ファイル種別');
            $table->integer('rank')->comment('順位');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
