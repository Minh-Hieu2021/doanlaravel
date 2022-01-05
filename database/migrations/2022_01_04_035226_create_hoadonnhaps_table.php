<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoadonnhapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadonnhaps', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->foreignId('NhanVien_id')->constrained('nhanviens');
            $table->string('MaHD');
            $table->datetime('NgNhap');
            $table->integer('TongTien');
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
        Schema::dropIfExists('hoadonnhaps');
    }
}
