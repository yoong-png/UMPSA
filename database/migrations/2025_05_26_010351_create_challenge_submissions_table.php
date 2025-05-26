<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('challenge_submissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->text('answer');
            $table->boolean('is_correct')->nullable(); // null = pending, true = correct, false = wrong
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('challenge_submissions');
    }
};
