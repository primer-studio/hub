<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRepositoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('repositories', function (Blueprint $table) {
        //     $table->id();
        //     $table->text('url');
        //     $table->text('options');

        //     $table->foreign('publisher_id')->references('id')->on('publishers');
        //     $table->foreign('service_id')->references('id')->on('services');

        //     $table->timestamps();
        //     $table->softDeletes();
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('repositories');
    }
}
