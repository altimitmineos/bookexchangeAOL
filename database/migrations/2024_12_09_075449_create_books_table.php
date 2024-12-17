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
            $table->decimal('Cost', 8, 2);
            $table->string('Author');
            $table->string('ISBN');
            $table->string('Publisher');
            $table->float('PrintWeight');
            $table->float('printWidth');
            $table->float('printLength');
            $table->integer('Page');
            $table->foreignId('Category_Id');
            $table->foreignId('Format_Id');
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
