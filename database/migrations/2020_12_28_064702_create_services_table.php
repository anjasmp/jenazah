<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('transactions_id');
            $table->unsignedBigInteger('user_families_id');
            $table->string('nama_ayah');
            $table->date('tanggal_wafat');
            $table->time('waktu_wafat');
            $table->string('tempat_wafat');
            $table->string('tempat_pemakaman');
            $table->string('kk_atau_ktp');
            $table->string('service_status');
            $table->softDeletes();
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
        Schema::dropIfExists('services');
    }
}
