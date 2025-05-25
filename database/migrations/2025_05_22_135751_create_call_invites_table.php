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
        Schema::create('call_invites', function (Blueprint $table) {
    $table->id();
    $table->foreignId('call_id')->constrained()->onDelete('cascade');
    $table->foreignId('inviter_id')->constrained('users');
    $table->foreignId('invitee_id')->constrained('users');
    $table->enum('status', ['pending', 'accepted', 'declined'])->default('pending');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('call_invites');
    }
};
