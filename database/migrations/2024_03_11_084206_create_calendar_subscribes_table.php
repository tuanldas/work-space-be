<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('calendar_subscribes', function (Blueprint $table) {
            $table->id();
            $table->uuid()->index()->unique();
            $table->foreignId('subscribers')->constrained('users');
            $table->foreignId('calendar_id')->constrained('calendars');
            $table->string('color', 10);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('calendar_subscribes');
    }
};
