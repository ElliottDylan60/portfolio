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
        Schema::create('tblProjectSkill', function (Blueprint $table) {
            $table->id('flngProjectSkillId');
            $table->bigInteger('flngSkillId');
            $table->bigInteger('flngProjectId');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tblProjectSkill');
    }
};
