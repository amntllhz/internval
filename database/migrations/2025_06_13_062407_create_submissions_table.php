<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('submissions', function (Blueprint $table) {
            $table->string('id', 16)->primary(); // UUID sebagai id pengajuan
            $table->string('nama_mahasiswa');
            $table->string('email');
            $table->string('nim')->index();
            $table->string('prodi');            
            $table->string('jenis_kelamin');
            $table->string('telepon');
            $table->string('instansi_tujuan');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->enum('status_pengajuan', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->enum('status_surat', ['none', 'made', 'ready'])->default('none');
            $table->text('alasan_penolakan')->nullable(); // untuk dosen jika menolak
            $table->foreignId('dospem_id')->nullable()->constrained('dospems')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('submissions');
    }
};
