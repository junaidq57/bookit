<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class OrderTableChanges extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('quick_order', function($table) {
            $table->string('longitude');
            $table->string('latitude');
            $table->string('customer_username');
            $table->string('customer_email');
            $table->string('customer_firstname');
            $table->string('customer_lastname');
            $table->decimal('shipping_amount');
            $table->string('shipping_description');
            $table->decimal('grand_total');
            $table->decimal('subtotal');
            $table->integer('total_item_count');
        });

        Schema::table('quick_order_items', function($table) {
            $table->string('item_description');
            $table->string('item_options');
            $table->decimal('weight');
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
