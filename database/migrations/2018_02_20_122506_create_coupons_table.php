<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code')->unique();
            $table->enum('type', ['price', 'percent'])->default('price');
            $table->integer('discount');
            $table->timestamp('expire_date')->nullable();
            $table->timestamps();
        });

        Schema::create('coupon_user', function (Blueprint $table) {
            $table->integer('coupon_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->primary(['coupon_id', 'user_id']);
        });

        Schema::table('orders', function (Blueprint $table) {
            $table->integer('coupon_id')->unsigned()->nullable();
            $table->decimal('discount', 8, 2)->default(0.00);
            $table->foreign('coupon_id')->references('id')->on('coupons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('coupons');
        Schema::dropIfExists('coupon_user');
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn('coupon_id');
            $table->dropColumn('discount');
        });
    }
}
