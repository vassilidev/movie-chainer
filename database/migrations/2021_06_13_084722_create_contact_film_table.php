<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactFilmTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contact_film', function (Blueprint $table) {
            $table->id();
            $table->foreignId('contact_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('film_id')
                ->constrained()
                ->onDelete('cascade');

            $table->foreignId('job_id')
                ->constrained()
                ->onDelete('cascade');

            $table->unique(['contact_id', 'film_id', 'job_id']);
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
        Schema::dropIfExists('contact_film');
    }
}
