<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('Title');
            $table->date('PublicationDate');
            $table->string('Author');
            $table->string('ISBN');
            $table->string('Publisher');
            $table->integer('PrintWeight');
            $table->integer('printWidth');
            $table->integer('printLength');
            $table->integer('Page');
            $table->unsignedBigInteger('Category_Id');
            $table->foreign('Category_Id')->references('id')->on('categories');
            $table->unsignedBigInteger('Formats_Id');
            $table->foreign('Formats_Id')->references('id')->on('formats');
            $table->integer('Stock');
            $table->string('Image');
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
        Schema::dropIfExists('books');
    }
};