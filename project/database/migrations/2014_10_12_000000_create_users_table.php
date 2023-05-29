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
/*         初期状態
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
 */
        Schema::create('users', function (Blueprint $table) {
            $table->string('u_id', 30)->primary();
            $table->string('u_name');
            $table->string('u_password');
            $table->string('u_mail')->unique();
            $table->string('u_address');
            $table->timestamp('u_lastlogin');
            $table->integer("age");
            $table->integer("gender");
            $table->timestamps();
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
