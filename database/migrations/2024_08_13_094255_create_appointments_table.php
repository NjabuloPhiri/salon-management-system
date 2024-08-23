<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    public function up()
    {
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('service_id')->constrained()->onDelete('cascade');
            $table->date('appointment_date');
            $table->time('appointment_time');
            $table->integer('group_size')->default(1); // Support for group bookings
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
