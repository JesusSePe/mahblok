<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BlocTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Creació de la taula posts
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('text', 500);
            $table->binary('image');
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
        });

        // Creació de la taula comentaris
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->foreignId('post_id')->constrained();
            $table->string('text', 240);
            $table->timestamps();
        });

        // Creació de la taula likes
        Schema::create('likes', function (Blueprint $table) {
            $table->id();
            $table->string('text', 240);
            $table->foreignId('user_id')->constrained();
            $table->foreignId('post_id')->constrained();
            $table->timestamps();
        });

        // Modificar Users
        Schema::table('users', function (Blueprint $table) {
            $table->binary('image')->nullable();
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('likes');
        Schema::dropIfExists('comments');
        Schema::dropIfExists('posts');
        if (Schema::hasColumn('users', 'image')){
            Schema::table('users', function(Blueprint $table) {
            $table->dropColumn('image');
            });
        }
    }
}
