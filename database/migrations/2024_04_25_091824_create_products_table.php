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
        Schema::create('products', function (Blueprint $table) {
            $table->increments("id");
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->integer('category_id')->unsigned();
            $table->text('short_text')->nullable();
            $table->double('price',8,2)->nullable();
            $table->string('size')->nullable();
            $table->string('color')->nullable();
            $table->string('quantity')->nullable();
            $table->enum('status',["0","1"])->default("0");
            $table->string("slug");
            $table->longText('content')->nullable();
            $table->timestamps();


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
