<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('fundraiser_id')->index();
            $table->string('email');
            $table->enum('rating', [1, 2, 3, 4, 5] );
            $table->text('review');
            //We'll store the review but wait for validation before displaying
            $table->boolean('validated');

            //Holds the has on the verification email
            $table->string('hash')->unique();
            $table->timestamps();

            //restrict the user to one review per fundraiser
            $table->unique(['email', 'fundraiser_id']);
            $table->foreign('fundraiser_id')
                ->references('id')->on('fundraisers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reviews');
    }
}
