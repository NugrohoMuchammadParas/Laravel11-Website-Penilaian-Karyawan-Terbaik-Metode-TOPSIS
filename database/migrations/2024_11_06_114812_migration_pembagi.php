<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pembagi', function (Blueprint $table) {
            $table->id('id_pembagi');
            $table->string('nama');
            $table->float('kinerja');
            $table->float('komunikasi');
            $table->float('kerjasama');
            $table->float('kreativitas');
            $table->float('disiplin');
            $table->timestamp('created_at')->nullable();
            $table->timestamp('updated_at')->nullable();
        });

        Schema::table('pembagi', function (Blueprint $table) {
            $table->unsignedBigInteger('id_alternatif')->nullable()->after('id_pembagi');

            $table->foreign('id_alternatif')->references('id_alternatif')->on('alternatif')->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::drop('pembagi');
    }
};
