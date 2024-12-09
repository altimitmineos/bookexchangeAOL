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
        Schema::create('book_reader', function (Blueprint $table) {
            $table->unsignedBigInteger('Book_Id');
            $table->foreign('Book_Id')->references('id')->on('books')->onDelete('restrict');
            $table->unsignedBigInteger('Reader_Id');
            $table->foreign('Reader_Id')->references('id')->on('readers')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('book_reader');
    }
};