<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 'src', 'timestamp', 'url', 'title'
        Schema::create('news', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('publisher_id');
            $table->unsignedBigInteger('service_id');

            $table->text('title');
            $table->text('url');
            $table->text('timestamp');
            $table->unsignedBigInteger('hits')->default(0);

            $table->foreign('publisher_id')->references('id')->on('publishers');
            $table->foreign('service_id')->references('id')->on('services');
            
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('news');
    }
}
