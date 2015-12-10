<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class LawyerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lawyer', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identification',10)->unique();
            $table->string('registration_number')->unique();
            $table->string('first_name',50);
            $table->string('last_name',50);
            $table->enum('gender', ['M','F']);
            $table->string('email');
            $table->string('address');
            $table->string('telephone',10);
            $table->string('mobile',10);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lawyer');
    }
}
