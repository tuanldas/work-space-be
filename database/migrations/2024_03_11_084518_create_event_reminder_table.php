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
        Schema::create('event_reminder', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index()->unique();
            $table->foreignId('event_id')->constrained('events');
            $table->string('type', 20);
            $table->integer('interval');
            $table->smallInteger('unit');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_reminder');
    }
};
