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
      

        Schema::create('divisions', function(Blueprint $table){
            $table->id();
            $table->string('uid')->unique();
            $table->string('name');
        });

        Schema::create('positions', function(Blueprint $table){
            $table->id();
            $table->string('uid')->unique();
            $table->string('name');
        });

        Schema::create('permissions', function(Blueprint $table){
            $table->id();
            $table->string('name')->unique();
            $table->string('description');
        });
        
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uid')->unique();
            $table->string('name')->unique();
            $table->string('img')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('position_uid');
            $table->string('division_uid');

            $table->foreign(['position_uid'])->references(['uid'])->on('positions');
            $table->foreign(['division_uid'])->references(['uid'])->on('divisions');
        });

        Schema::create('user_permissions', function(Blueprint $table){
            $table->id();
            $table->string('user_uid');
            $table->unsignedBigInteger('permission_id');
        });

        Schema::table('user_permissions', function (Blueprint $table) {
            $table->foreign(['permission_id'])->references(['id'])->on('permissions');
            $table->foreign(['user_uid'])->references(['uid'])->on('users');
        });

        Schema::create('warehouses', function(Blueprint $table){
            $table->id();
            $table->string('uid');
            $table->string('no_so');
            $table->string('file');
            $table->string('description');
            $table->string('user_uid');
            $table->string('created_at');

            $table->foreign(['user_uid'])->references(['uid'])->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('divisions');
        Schema::dropIfExists('positions');
        Schema::dropIfExists('permissions');
        Schema::dropIfExists('user_permissions');
    }
};
