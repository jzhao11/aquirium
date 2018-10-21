<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateItemTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create("ct_item", function(Blueprint $table) {
            $table->increments("id");
            $table->integer("user_id")->index();
            $table->integer("category_id")->index();
            $table->integer("filter_id")->index();
            $table->string("title");
            $table->text("description");
            $table->double("price");
            $table->string("unit");
            $table->string("title_img");
            $table->string("detail_img0");
            $table->string("detail_img1");
            $table->string("detail_img2");
            $table->string("detail_img3");
            $table->tinyInteger("status");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop("ct_item");
    }
}
