<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAmenityTicketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('amenity_ticket', function (Blueprint $table) {
            $table->bigInteger('amenity_id')->unsigned();
            $table->bigInteger('ticket_id')->unsigned();
            $table->foreign('amenity_id')
            ->references('id')->on('amenities')
            ->onDelete('cascade');
            $table->foreign('ticket_id')
            ->references('id')->on('tickets')
            ->onDelete('cascade');
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
        Schema::dropIfExists('amenity_ticket');
    }
}
