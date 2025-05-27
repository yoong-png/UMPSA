<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddApprovedToChallengeSubmissions extends Migration
{
    public function up(): void
    {
        Schema::table('challenge_submissions', function (Blueprint $table) {
            $table->boolean('approved')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('challenge_submissions', function (Blueprint $table) {
            $table->dropColumn('approved');
        });
    }
}
