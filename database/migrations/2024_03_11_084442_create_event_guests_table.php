<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('event_guests', function (Blueprint $table) {
            $table->id();
            $table->uuid()->index()->unique();
            $table->foreignId('event_id')->constrained('events');
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('event_guests');
    }
};
