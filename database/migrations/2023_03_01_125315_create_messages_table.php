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
        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->softDeletes();
            $table->unsignedBigInteger("from_user_id");
            $table->unsignedBigInteger("to_user_id");
            $table->text("content");
            $table->json("additional_files")->nullable();
            $table->timestamps();
            $table->foreign("from_user_id")->references("id")->on("users");
            $table->foreign("to_user_id")->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('messages');
    }
};
