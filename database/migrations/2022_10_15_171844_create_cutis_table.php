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
        Schema::create('cutis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_jenisCuti')
            ->constrained('jenis_cutis')
            ->cascadeOnUpdate()->cascadeOnDelete();
            $table->text('alasan_cuti');
            $table->date('lama_cuti');
            $table->text('alamat_cuti');
            $table->integer('no_telp');
            $table->foreignId('id_pegawai')
            ->constrained('pegawais')
            ->cascadeOnUpdate()->cascadeOnDelete();
            $table->enum('status', ['Menunggu Approval', 'Disetujui', 'Tidak Disetujui']);
            $table->string('upload_file');
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
        Schema::dropIfExists('cutis');
    }
};
