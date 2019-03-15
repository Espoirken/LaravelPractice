<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('children', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('user_id');
            $table->string('name');
            $table->string('nickname')->nullable();
            $table->string('credits')->default(0);
            $table->dateTime('expiration')->nullable();
            $table->string('gender');
            $table->string('sport');
            $table->string('birthdate');
            $table->string('level')->nullable();
            $table->string('batting');
            $table->string('throwing_hand');
            $table->string('special_medical_condition');
            $table->string('status')->default('Active');
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
        Schema::dropIfExists('children');
    }
}
