<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoryTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        //
        Schema::create("ct_category", function(Blueprint $table) {
            $table->increments("id");
            $table->string("title");
            $table->integer("priority");
            $table->integer("parent_id")->nullable()->index();
            $table->integer("lft")->nullable()->index();
            $table->integer("rgt")->nullable()->index();
            $table->integer("depth")->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        //
        Schema::drop("ct_category");
    }
}
