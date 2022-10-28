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
        Schema::create('coursedetails', function (Blueprint $table) {
            $table->id('cdId');
            $table->string('cdLesson');
            $table->string('cdTopic');
            $table->text('cdDesc')->nullable();
            $table->time('cdDuration');
            $table->text('cdVideo');
            $table->text('cdFile');
            $table->bigInteger('courseId');
            $table->foreign('courseId')->references('courseId')->on('courses')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('coursedetails');
    }
};
