<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->uuid('id');
            $table->string('name');
            $table->string('cpf')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->bigInteger('wallet_id')->unsigned()->index();
            $table->integer('type');
            $table->foreign('wallet_id')
                ->references('id')
                ->on('wallets')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
