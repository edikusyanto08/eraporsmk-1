<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class KdNilai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kd_nilai', function (Blueprint $table) {
			$table->uuid('kd_nilai_id');
			$table->uuid('sekolah_id');
			$table->uuid('rencana_penilaian_id');
			$table->integer('kd_id');
			$table->string('id_kompetensi',10);
			$table->uuid('kd_nilai_id_migrasi')->nullable();
			$table->timestamps();
			$table->softDeletes();
			$table->timestamp('last_sync');
			$table->primary('kd_nilai_id');
			$table->foreign('sekolah_id')->references('sekolah_id')->on('sekolah')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');
			$table->foreign('rencana_penilaian_id')->references('rencana_penilaian_id')->on('rencana_penilaian')
                ->onUpdate('RESTRICT')->onDelete('RESTRICT');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kd_nilai');
    }
}
