<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email');
            $table->text('comment');
            $table->unsignedInteger('post_id');
            $table->boolean('approved');
            $table->timestamps();
        });

        Schema::table('comments' , function($table){
             $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');   
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {   
        Schema::table('comments', function (Blueprint $table) {

              $table->dropForeign('comments_post_id_foreign');


        });
                              Schema::dropIfExists('comments');



    }
}
