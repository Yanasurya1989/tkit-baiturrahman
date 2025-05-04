<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('navbar_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url')->nullable();
            $table->string('type')->default('link'); // link | dropdown
            $table->unsignedBigInteger('parent_id')->nullable(); // for dropdown items
            $table->integer('order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('navbar_items');
    }
};
