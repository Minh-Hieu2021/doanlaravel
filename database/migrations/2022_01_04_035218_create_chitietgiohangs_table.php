<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitietgiohangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitietgiohangs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('GioHang_id')->constrained('giohangs');
            $table->foreignId('SanPham_id')->constrained('sanphams');
            $table->integer('SL');
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
        Schema::dropIfExists('chitietgiohangs');
    }
}
