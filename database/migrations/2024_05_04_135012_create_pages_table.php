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
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->integer('SubId')->nullable();
            $table->text('PageTitle');
            $table->text('PageSubTitle')->nullable();
            $table->string('PageContent', 500)->nullable();
            $table->string('PageImage')->nullable();
            $table->enum('Status', ["on", "off"])->default("on");
            $table->enum('IsMenu', ["on", "off"])->default("on");
            $table->string('SelectPage', 50)->nullable();
            $table->text('Slug')->nullable();
            $table->text('MetaTitle')->nullable();
            $table->text('MetaDescription')->nullable();
            $table->text('MetaKeywords')->nullable();
            $table->integer('order')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pages');
    }
};
