<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('logos', function (Blueprint $table) {
            $table->string('institution_name')->nullable()->after('path');
        });
    }

    public function down()
    {
        Schema::table('logos', function (Blueprint $table) {
            $table->dropColumn('institution_name');
        });
    }
};
