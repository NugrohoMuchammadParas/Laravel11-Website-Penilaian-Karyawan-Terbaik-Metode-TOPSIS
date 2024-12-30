<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jarak_positif', function (Blueprint $table) {
            $table->id('id_jarak_positif');
            $table->integer('id_karyawan');
            $table->float('nilai');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('jarak_positif', function (Blueprint $table) {
            $table->unsignedBigInteger('id_alternatif')->nullable()->after('id_jarak_positif');

            $table->foreign('id_alternatif')->references('id_alternatif')->on('alternatif')->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::drop('jarak_positif');
    }
};
