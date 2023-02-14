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
        Schema::table('bbs', function (Blueprint $table) {
            $table->json("state")->default(json_encode(["addendum"=>false,"accept"=>false,"user_id"=>null,"date_add"=>null,"accept_date"=>null, "options"=>null]))->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bbs', function (Blueprint $table) {
            $table->dropColumn("state");
        });
    }
};
