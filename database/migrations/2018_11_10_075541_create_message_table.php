<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessageTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create("message", function(Blueprint $table) {
            $table->increments("id");
            $table->integer("item_id")->index();
            $table->integer("from_user_id")->index();
            $table->integer("to_user_id")->index();
            $table->text("content");
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
        Schema::drop("ct_message");
    }
}
