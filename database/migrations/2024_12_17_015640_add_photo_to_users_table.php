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
    // database/migrations/xxxx_xx_xx_xxxxxx_add_photo_to_users_table.php

public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('photo')->nullable()->after('email'); // Menambahkan kolom photo
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('photo'); // Menghapus kolom photo jika migrasi dibatalkan
    });
}

};
