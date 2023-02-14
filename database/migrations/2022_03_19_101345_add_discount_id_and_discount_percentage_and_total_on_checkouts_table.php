<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDiscountIdAndDiscountPercentageAndTotalOnCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->foreignId('discount_id')->after('camp_id')->nullable()->constrained();
            $table->unsignedInteger('discount_percentage')->after('midtrans_booking_code')->nullable();
            $table->unsignedInteger('total')->after('discount_percentage')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('checkouts', function (Blueprint $table) {
            $table->dropForeign('checkouts_discount_id_foreign');
            $table->dropColumn(['discount_id', 'discount_percentage', 'total']);
        });
    }
}
