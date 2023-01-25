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
        Schema::create('temp_probabilitas', function (Blueprint $table) {
            $table->id();
            $table->string('penyakit_id');
            $table->string('gejala_id');
            $table->string('nilai');
            $table->string('probabilitas')->nullable();
            $table->string('probabilitas_hipotesis')->nullable();
            $table->string('probabilitas_hipotesis_evidence')->nullable();
            $table->string('hi')->nullable();
            $table->string('kesimpulan')->nullable();
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
        Schema::dropIfExists('temp_probabilitas');
    }
};
