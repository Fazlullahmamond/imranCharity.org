<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDonatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donates', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable();
            $table->foreignId('donation_type_id');
            $table->integer('donation_amount')->unsigned();
            $table->string('currency')->default('AF');
            $table->date('donation_date');
            $table->date('donation_delivery');
            $table->foreignId('needy_people_id')->nullable();
            $table->text('description');
            $table->string('donation_location');
            $table->foreignId('donation_box_id')->nullable();
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
        Schema::dropIfExists('donates');
    }
}
