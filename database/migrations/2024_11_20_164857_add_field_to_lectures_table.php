<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('lectures', function (Blueprint $table) {
            $table->string('file_path')->nullable()->after('file_type'); // Add 'file_path' field
        });
    }
    
    public function down()
    {
        Schema::table('lectures', function (Blueprint $table) {
            $table->dropColumn('file_path'); // Rollback by removing the field
        });
    }
    
};
