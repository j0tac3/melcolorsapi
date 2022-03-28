<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateColorsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('colors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('company_id');
            $table->foreign('company_id')
                    ->references('id')
                    ->on('companys')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')
                    ->references('id')
                    ->on('categorys')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->string('code', 50);
            $table->string('desc_en', 50);
            $table->string('desc_es', 50);
            $table->string('hex_code', 50);
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
        Schema::dropIfExists('colors');
    }
}