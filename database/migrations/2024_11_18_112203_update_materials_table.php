<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateMaterialsTable extends Migration
{
    public function up()
{
    Schema::table('materials', function (Blueprint $table) {
        if (!Schema::hasColumn('materials', 'file_name')) {
            $table->string('file_name')->after('id');
        }
        if (!Schema::hasColumn('materials', 'file_path')) {
            $table->string('file_path')->after('file_name');
        }
    });
}

    public function down()
    {
        Schema::table('materials', function (Blueprint $table) {
            if (Schema::hasColumn('materials', 'file_name')) {
                $table->dropColumn('file_name');
            }

            if (Schema::hasColumn('materials', 'file_path')) {
                $table->dropColumn('file_path');
            }
        });
    }
}
