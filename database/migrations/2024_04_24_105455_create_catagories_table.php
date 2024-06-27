<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('catagories', function (Blueprint $table) {
            $table->increments("id");
            $table->string("image")->nullable();
            $table->string("thumbail")->nullable();
            $table->string("name");
            $table->string("slug")->nullable();
            $table->text('content')->nullable();
            $table->integer('child_category')->nullable()->default(0);
            $table->enum('status', ["on", "off"])->default('on');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catagories');
    }
};
