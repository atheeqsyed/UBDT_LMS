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
        Schema::table('materials', function (Blueprint $table) {
            $table->unsignedBigInteger('uploaded_by')->nullable()->after('file_path');
        });
    }
    
    public function down()
    {
        Schema::table('materials', function (Blueprint $table) {
            $table->dropColumn('uploaded_by');
        });
    }
    
};
