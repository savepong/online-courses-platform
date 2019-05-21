<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('invoice_number', 20);
            $table->decimal('total_price', 8, 2)->default(0.00);
            $table->decimal('net_price', 8, 2)->default(0.00);
            $table->integer('vat_percent')->default(7);
            $table->string('billing_to')->nullable();
            $table->string('billing_address')->nullable();
            $table->string('billing_country')->nullable();
            $table->enum('status', ['pending', 'paid', 'cancelled'])->default('pending');
            $table->timestamps();
        });


        Schema::create('course_order', function (Blueprint $table) {
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->integer('course_id')->unsigned();
            $table->foreign('course_id')->references('id')->on('courses')->onDelete('cascade');
            $table->primary(['order_id', 'course_id']);
        });


        Schema::table('payments', function (Blueprint $table) {
            $table->integer('order_id')->unsigned();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
            $table->string('method');
            $table->decimal('amount', 8, 2);
            $table->date('date')->nullable();
            $table->time('time')->nullable();
            $table->string('receipt');
            $table->string('memo')->nullable();
            $table->integer('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('users');
            $table->timestamp('approved_at')->nullable();
            $table->timestamp('cancelled_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
        Schema::dropIfExists('order_course');
        Schema::table('payments', function (Blueprint $table) {
            $table->dropColumn('order_id');
            $table->dropColumn('method');
            $table->dropColumn('amount');
            $table->dropColumn('date');
            $table->dropColumn('time');
            $table->dropColumn('receipt');
            $table->dropColumn('memo');
            $table->dropColumn('admin_id');
            $table->dropColumn('approved_at');
            $table->dropColumn('cancelled_at');
        });
    }
}
