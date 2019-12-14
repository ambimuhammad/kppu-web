<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFieldToRecentWorks extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('recent_works', function (Blueprint $table) {
            $table->string('kategori_recent_work')->after('id');
            $table->text('deskripsi_recent_work')->after('name_recent_work');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('recent_works', function (Blueprint $table) {
            $table->dropColumn(['kategori_recent_work', 'deskripsi_recent_work']);
        });
    }
}
