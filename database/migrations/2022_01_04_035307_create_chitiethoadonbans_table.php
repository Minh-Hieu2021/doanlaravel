<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChitiethoadonbansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chitiethoadonbans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('SanPham_id')->constrained('sanphams');
            $table->foreignId('HoaDonBan_id')->constrained('hoadonbans');
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
        Schema::dropIfExists('chitiethoadonbans');
    }
}
