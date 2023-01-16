<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Symfony\Component\Console\Helper\Table;

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
            $table->string('image')->nullable();
            $table->string("sex")->nullable();
            $table->string("age")->nullable();
            $table->string("description")->nullable();
            $table->string("relationship_status")->nullable();
            $table->string("facebook")->nullable();
            $table->string("instagram")->nullable();
            $table->string("twitter")->nullable();
            $table->string("current_city")->nullable();
            $table->string("hometown")->nullable();
            $table->string("interested_in")->nullable();
            $table->string("favorite_question")->nullable();
            $table->string("job")->nullable();
            $table->boolean("isAdmin")->nullable();
            $table->boolean("isSuperAdmin")->nullable();
            $table->boolean("isExpert")->nullable();
            $table->boolean("submitedForReview")->nullable();
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
};
