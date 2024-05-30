<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestListTable extends Migration
{
    public function up()
    {
        Schema::create('request_list', function (Blueprint $table) {
            $table->id();
            $table->string('user');
            $table->string('requested_type');
            $table->string('itemType');
            $table->dateTime('requested_on');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('request_list');
    }
}
