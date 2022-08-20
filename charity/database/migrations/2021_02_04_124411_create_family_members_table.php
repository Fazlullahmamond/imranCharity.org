<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamilyMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('family_members', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable();
            $table->string('father_name')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('job')->nullable();
            $table->date('date_birth')->nullable();
            $table->integer('gender')->unsigned();
            $table->text('image')->default('family_member.jpg');
            $table->foreignId('needy_people_id');
            $table->foreignId('relationship_id');
            $table->text('description')->nullable();
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
        Schema::dropIfExists('family_members');
    }
}
