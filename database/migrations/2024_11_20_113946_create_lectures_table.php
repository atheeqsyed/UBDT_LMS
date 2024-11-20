<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLecturesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('lectures', function (Blueprint $table) {
        $table->id();
        $table->string('title');
        $table->string('subject');
        $table->date('upload_date');
        $table->string('file_type');
        $table->timestamps();
    });
}

public function down()
{
    Schema::dropIfExists('lectures');
}

}
