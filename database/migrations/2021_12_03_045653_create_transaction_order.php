<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaction_order', function (Blueprint $table) {
            $table->id();
            $table->string('no_invoice');
            $table->dateTime('tgl_transaksi');
            $table->integer('id_pelanggan');
            $table->integer('id_kasir');
            $table->integer('total_harga');
            $table->integer('total_bayar')->nullable(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaction_order');
    }
}
