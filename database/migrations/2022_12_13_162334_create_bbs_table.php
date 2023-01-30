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
        Schema::create('bbs', function (Blueprint $table) {

            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onDelete('cascade');
             // создание внешнего ключа для табицы "Рубрки"
            $table->unsignedBigInteger("rubric_id");
            $table->foreign("rubric_id")->references("id")->on("rubrics")->nullOnDelete();         
            $table->string("title", 50);
            $table->text("content");
            $table->float("price");
            $table->text("adress");
            $table->timestamps();
            $table->index("created_at");
            // мягкое удаление
            $table->softDeletes();
            // создание временной таблицы
            // $table->temporary();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bbs');
    }
};
