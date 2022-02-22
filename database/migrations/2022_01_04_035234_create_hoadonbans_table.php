<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoadonbansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonbans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('Khachhang_id')->constrained('khachhangs');
            $table->string('MaHD');
            $table->datetime('NgLap');
            $table->integer('TongTien');
            $table->boolean('TrangThai');
            $table->string('SDT');
            $table->string('DChi');
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
        Schema::dropIfExists('hoadonbans');
    }
}
