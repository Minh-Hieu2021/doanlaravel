<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitiethoadonnhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiethoadonnhaps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('HoaDonNhap_id')->constrained('hoadonnhaps');
            $table->foreignId('SanPham_id')->constrained('sanphams');
            $table->string('MaSanPham');
            $table->integer('SL');
            $table->integer('GiaBan');
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
        Schema::dropIfExists('chitiethoadonnhaps');
    }
}
