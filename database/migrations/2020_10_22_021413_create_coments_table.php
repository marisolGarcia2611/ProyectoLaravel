<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coments', function (Blueprint $table) 
        {
            $table->id();
            $table->string('mensaje',100);
            $table->foreignId('product_id');
            $table->foreignId('usuario_id');
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
        Schema::table('coments', function (Blueprint $table) {
            $table->id();
            $table->dropColumn(['mensaje']);
            $table->dropForeign(['product_id']);  
            $table->dropForeign(['usuario_id']);   
        });



    }
}