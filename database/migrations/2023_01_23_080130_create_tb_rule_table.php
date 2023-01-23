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
        Schema::create('tb_rule', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penyakit_id')->constrained('tb_penyakit')->cascadeOnDelete();
            $table->foreignId('gejala_id')->constrained('tb_gejala')->cascadeOnDelete();
            $table->float('nilai', 8, 2);
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
        Schema::dropIfExists('tb_rule');
    }
};
