<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('pseudo', 255); // Ajout de la colonne 'pseudo'
            $table->string('image', 255)->nullable();
            $table->string('email', 191)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 255);
            $table->string('role', 255)->default('user');
            $table->rememberToken();
            $table->timestamps();
            $table->tinyInteger('role_id')->unsigned()->default(2)->comment('1: Administrateur, 2: Utilisateur');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}