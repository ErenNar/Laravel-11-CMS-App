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
        Schema::create('site_settings', function (Blueprint $table) {
            $table->id();
            $table->string('site_name')->nullable();
            $table->string('site_descritption')->nullable();
            $table->string('site_keywords')->nullable();
            $table->string('site_author')->nullable();
            $table->string('site_logo')->nullable();
            $table->string('site_second_logo')->nullable();
            $table->string('site_favicon')->nullable();
            $table->string('mail_address')->nullable();
            $table->string('mail_password')->nullable();
            $table->string('imap_server')->nullable();
            $table->string('imap_connection_location')->nullable();
            $table->string('imap_password')->nullable();
            $table->string('smtp_password')->nullable();
            $table->string('addres')->nullable();
            $table->string('phone')->nullable();
            $table->string('mail')->nullable();
            $table->string('fax')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('facebook')->nullable();
            $table->string('youtube')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('pinterest')->nullable();
            $table->string('reddit')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_settings');
    }
};
