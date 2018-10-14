<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropsalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('propsals', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('propsal_type',['Web Development','Digital Marketing','Web Product']);
            $table->string('type_alias');
            $table->enum('client_source',['Recap','Digital Campaign']);
            $table->string('source_alias');
            $table->integer('propsal_number')->nullable();
            $table->string('client_name');
            $table->dateTime('propsal_date')->nullable();
            $table->string('propsal_value');

            $table->integer('created_by')->unsigned();
            $table->foreign('created_by')->references('id')->on('users');

            $table->integer('approved_by')->unsigned()->nullable();
            $table->foreign('approved_by')->references('id')->on('users');
            
            $table->string('code_criteria')->nullable();
            $table->timestamps();
        });
        DB::statement('ALTER TABLE propsals CHANGE propsal_number propsal_number INT(3) UNSIGNED ZEROFILL ');

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('propsals');
    }
}
