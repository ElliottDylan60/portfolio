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
        Schema::create('tblProject', function (Blueprint $table) {
            $table->id('flngProjectId');
            $table->string('fstrProjectTitle');
            $table->longText('fstrNotes')->nullable();
            $table->string('fstrConsole')->nullable();
            $table->string('fstrSource')->nullable();
            $table->longText('fstrAbout')->nullable();

            $table->string('fstrStatus')->nullable();
            $table->string('fstrType')->nullable();
            $table->string('fstrDescription')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblProject');
    }
};
