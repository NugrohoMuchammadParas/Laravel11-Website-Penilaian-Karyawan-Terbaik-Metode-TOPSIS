<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('laporan', function (Blueprint $table) {
            $table->id('id_laporan');
            $table->date('tanggal');
            $table->string('file');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('laporan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_akun')->nullable()->after('id_laporan');
            $table->foreign('id_akun')->references('id_akun')->on('akun')->onUpdate('cascade')
                ->onDelete('cascade');

            $table->unsignedBigInteger('id_karyawan')->nullable()->after('id_akun');
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawan')->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::drop('laporan');
    }
};
