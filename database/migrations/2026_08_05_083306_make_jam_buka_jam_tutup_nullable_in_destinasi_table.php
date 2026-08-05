<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('destinasi', function (Blueprint $table) {
            $table->time('jam_buka')->nullable()->change();
            $table->time('jam_tutup')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('destinasi', function (Blueprint $table) {
            $table->time('jam_buka')->nullable(false)->change();
            $table->time('jam_tutup')->nullable(false)->change();
        });
    }
};