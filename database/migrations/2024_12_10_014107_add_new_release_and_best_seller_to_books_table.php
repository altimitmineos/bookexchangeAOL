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
        Schema::table('books', function (Blueprint $table) {  
            $table->boolean('is_new_release')->default(false)->after('Image');  
            $table->boolean('is_best_seller')->default(false)->after('is_new_release');  
        });  
    }  

    /**  
     * Reverse the migrations.  
     *  
     * @return void  
     */  
    public function down()  
    {  
        Schema::table('books', function (Blueprint $table) {  
            $table->dropColumn('is_new_release');  
            $table->dropColumn('is_best_seller');  
        });  
    }  
};