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
            $table->id();
            $table->string('full_name');
            $table->string('email')->unique();
            $table->integer('age')->nullable();
            $table->integer('phone_number')->unique()->nullable();
            $table->string(column: 'address')->nullable();
            $table->boolean(column: 'disability')->nullable();
            $table->string(column: 'gender')->nullable();
            $table->string(column: 'identification')->nullable();
            $table->string(column: 'photo')->nullable();
            $table->string(column: 'domestic_id')->nullable();
            $table->enum('role', ['domestic_staff', 'employer']);
            $table->timestamp('email_verified_at')->nullable();
            $table->boolean(column: 'occupation')->nullable();
            $table->boolean(column: 'approved')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('users');
    }
}
