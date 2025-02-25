<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');

            $table->string('phone');
            $table->string('drivers_license');
            $table->boolean('is_admin')->default(false);


            $table->rememberToken();
            $table->timestamps();



        });

        // ... existing code for other tables ...
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
};
