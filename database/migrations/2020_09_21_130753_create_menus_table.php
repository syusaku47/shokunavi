<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMenusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',20);
            $table->text('description',255)->nullable();
            $table->integer('price')->default(0);
            $table->integer('tips')->default(0);
            $table->integer('hot')->default(0);
            $table->integer('spice')->default(0);
            $table->integer('category_id')->default(1);

            $table->integer('content_id')->unsigned();

            $table->timestamps();
            $table->foreign('content_id')->references('id')->on('contents')->onDelete('cascade');
            // $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('menus');
    }
}
