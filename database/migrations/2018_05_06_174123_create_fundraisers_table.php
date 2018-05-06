<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFundraisersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fundraisers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->index();
            $table->string('location');
            //Instead of calculating on each view we'll calculate on change to keep db load low
            $table->decimal('rating', 3, 2)->nullable();
            //We'll generate a slug to use for readable urls since google likes that
            $table->string('slug');
            $table->timestamps();

            //lets try to prevent duplicate events being created
            $table->unique(['name', 'location']);
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fundraisers');
    }
}
