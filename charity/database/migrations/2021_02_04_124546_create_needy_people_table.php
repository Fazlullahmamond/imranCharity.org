<?php

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNeedyPeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('needy_people', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('father_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('hometown')->nullable();
            $table->string('current_address');
            $table->date('date_birth')->nullable();
            $table->integer('gender');
            $table->string('image')->default('needy.jpg');
            $table->string('id_card_number')->nullable();
            $table->text('predictive_needs');
            $table->integer('needy_percentage')->unsigned();
            $table->text('description')->nullable();
            $table->foreignId('person_type_id');
            $table->foreignId('user_id');
            $table->timestamps();
            $table->SoftDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('needy_people');
    }
}
