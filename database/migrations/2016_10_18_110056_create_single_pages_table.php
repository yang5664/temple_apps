<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSinglePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('single_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('admin_user_id');
            $table->string('type',50);
            $table->string('title');
            $table->text('content');
            $table->dateTime('publish_date');
            $table->foreign('admin_user_id')->references('id')->on('admin_users')->onDelete('cascade');
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
        Schema::dropIfExists('single_pages');
    }
}
