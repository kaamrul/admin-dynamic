<?php

use App\Models\User;
use App\Library\Enum;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name', 192)->nullable();
            $table->string('last_name', 192)->nullable();
            $table->string('username', 192)->nullable();
            $table->string('phone',191)->nullable();
            $table->string('email', 192)->nullable();
            $table->string('password', 100)->nullable();
            $table->enum('user_type', array_keys(Enum::getUserType()));
            $table->text('description')->nullable();
            $table->enum('status', array_keys(Enum::getUserStatus()))->default(Enum::USER_STATUS_PENDING)->comment('PENDING, ACTIVE, SUSPENDED');
            $table->string('avatar', 255)->nullable();
            $table->unsignedBigInteger('gender_id')->nullable();
            $table->unsignedBigInteger('operator_id')->nullable();
            $table->dateTime('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('gender_id')->references('id')->on('sm_base_setups');
            $table->foreign('operator_id')->references('id')->on('users');
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
};
