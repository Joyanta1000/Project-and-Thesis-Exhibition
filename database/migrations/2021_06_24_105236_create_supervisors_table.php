<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSupervisorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('supervisors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('supervisor_id')->nullable();
            $table->foreign('supervisor_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->unsignedBigInteger('designation_id')->nullable();
            $table->foreign('designation_id')->references('id')->on('designations')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('id')->on('departments')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('university_id')->nullable();
            $table->foreign('university_id')->references('id')->on('universities')->onDelete('cascade')->onUpdate('cascade');
            $table->string('slug')->nullable();
            $table->string('is_active')->nullable();
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
        Schema::dropIfExists('supervisors');
    }
}
