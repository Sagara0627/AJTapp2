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
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->integer('rank_id')->comment('ランキングID');
            $table->string('name', 255)->comment('店名');
            $table->string('nearest_station', 255)->comment('最寄駅');
            $table->string('prefecture', 40)->comment('都道府県');
            $table->string('city', 100)->nullable()->comment('市区町村');
            $table->string('street', 100)->nullable()->comment('番地');
            $table->string('website', 255)->nullable()->comment('Webサイト');
            $table->string('file_name', 255)->comment('ファイル名');
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
        Schema::dropIfExists('restaurants');
    }
};
