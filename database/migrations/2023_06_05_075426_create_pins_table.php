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
        Schema::create('pins', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('picture')->nullable();
            $table->string('pin_name');
            $table->integer('genre')->comment("1:食べ物 2:宿ホテル 3:文化 4:遊び施設 5:自然");
            $table->string('detail');
            $table->integer('pin_flag')->default(0);
            $table->integer('like_count')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pins');
    }
};
