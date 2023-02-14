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
        Schema::create('machine_spare', function (Blueprint $table) {
            $table->id();
            $table->foreignId("machine_id")->constrained()->cascadeOnDelete();
            $table->foreignId("spare_id")->constrained()->cascadeOnDelete();
            $table->unsignedSmallInteger("cnt")->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('machine_spares');
    }
};
