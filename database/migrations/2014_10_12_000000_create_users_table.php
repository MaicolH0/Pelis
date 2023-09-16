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
            $table->string('fullname');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('photo')->default('images/no-photo.png');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            //Foreign keys
            $table->unsignedBigInteger('role_id');
            $table->foreign('role_id')->references('id')->on('roles')
                                                        ->onUpdate('cascade') //para que cuando se borren los roles también se borren los usuarios en cascada
                                                        ->onDelete('cascade');//para que cuando se actualicen los roles también se actualicen los usuarios en cascada

            $table->rememberToken();
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
