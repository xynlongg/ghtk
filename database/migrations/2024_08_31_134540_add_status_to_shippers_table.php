<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToShippersTable extends Migration
{
    public function up()
    {
        Schema::table('shippers', function (Blueprint $table) {
            $table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
        });
    }

    public function down()
    {
        Schema::table('shippers', function (Blueprint $table) {
            $table->dropColumn('status');
        });
    }
}