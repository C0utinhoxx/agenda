<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSportsActivitiesTable extends Migration
{
    public function up()
    {
        Schema::create('sports_activities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->date('date');
            $table->time('start_time');
            $table->time('end_time');
            $table->enum('recurrence', ['once', 'weekly'])->default('once');
            $table->integer('recurrence_weeks')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('Sport');
    }
}