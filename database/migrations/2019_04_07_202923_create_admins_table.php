<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name')->nullable();
            $table->string('email')->unique();
            $table->text('description')->nullable();
            $table->string('password');
            $table->string('phone', 20);
            $table->string('address')->nullable();
            $table->text('avatar')->nullable();
            $table->string('job')->nullable();
            $table->string('slug')->nullable();
            $table->timestamp('email_verified_at')->nullable();

            $table->boolean('deleted')->default(0);

            $table->rememberToken();
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
        Schema::dropIfExists('admins');
    }
}
