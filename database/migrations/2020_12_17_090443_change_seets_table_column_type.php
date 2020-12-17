<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSeetsTableColumnType extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seets', function (Blueprint $table) {
            $table->renameColumn('type','type_id')->unsigned()->change();
            $table->foreign('type_id')->references('id')->on('types')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seets', function (Blueprint $table) {
            $table->dropColumn('type_id');
        });
    }
}
