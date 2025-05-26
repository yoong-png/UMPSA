<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChallengeSubmission extends Model
{
    protected $fillable = ['user_id', 'answer', 'is_correct'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
