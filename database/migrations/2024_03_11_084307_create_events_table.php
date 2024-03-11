<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid')->index()->unique();
            $table->foreignId('event_person')->constrained('users');
            $table->foreignId('calendar_id')->constrained('calendars');
            $table->boolean('is_repeat')->default(false);
            $table->boolean('is_all_day')->default(false);
            $table->string('title', 150);
            $table->dateTime('start_time');
            $table->dateTime('end_time');
            $table->text('note')->nullable();
            $table->foreignId('parent_event')->nullable()->constrained('events');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
