<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->id('id_karyawan');
            $table->string('nama');
            $table->date('lahir');
            $table->string('telepon');
            $table->string('email');
            $table->string('alamat');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('karyawan', function (Blueprint $table) {
            $table->unsignedBigInteger('id_akun')->nullable()->after('id_karyawan');

            $table->foreign('id_akun')->references('id_akun')->on('akun')->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::drop('karyawan');
    }
};
