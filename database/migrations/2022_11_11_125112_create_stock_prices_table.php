<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock_prices', function (Blueprint $table) {
            $table->id();
            $table->string('symbol')->unique();
            $table->string('companyName');
            $table->decimal('latestPrice', 15, 4);
            $table->decimal('avgTotalVolume', 15, 4);
            $table->dateTime('latestUpdate');
            $table->string('primaryExchange');
            $table->decimal('change', 15, 4);
            $table->string('currency');
            $table->decimal('marketCap', 25, 4);
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
        Schema::dropIfExists('stock_prices');
    }
};
