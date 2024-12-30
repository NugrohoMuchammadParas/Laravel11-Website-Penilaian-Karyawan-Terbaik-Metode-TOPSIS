<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kriteria', function (Blueprint $table) {
            $table->id('id_kriteria');
            $table->string('kriteria');
            $table->string('keterangan');
            $table->integer('bobot');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('kriteria', function (Blueprint $table) {
            $table->unsignedBigInteger('id_akun')->nullable()->after('id_kriteria');

            $table->foreign('id_akun')->references('id_akun')->on('akun')->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::drop('kriteria');
    }
};
