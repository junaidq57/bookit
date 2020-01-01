<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MissingColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::table('quick_order_items', function($table) {
        //     $table->string('presciption_image')->nullable();
        // });
        // Schema::table('user_details', function($table) {
        //     $table->string('state')->nullable();
        //     $table->string('city')->nullable();
        //     $table->string('postcode')->nullable();
        // });
        Schema::create('facilitator', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->boolean('is_engaged');
            $table->boolean('available');
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('user_id')->references('id')->on('users')
                ->onUpdate('cascade')->onDelete('cascade');
        });
        Schema::create('facilitator_tracks', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('facilitator_id')->unsigned();
            $table->string('longitude')->nullable();
            $table->string('latitude')->nullable();
            $table->timestamp('created_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(\DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('deleted_at')->nullable();
            $table->foreign('facilitator_id')->references('id')->on('facilitator')
                ->onUpdate('cascade')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
