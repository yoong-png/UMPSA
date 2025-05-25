<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CallInvite extends Model
{
    protected $fillable = ['call_id', 'inviter_id', 'invitee_id', 'status'];

    public function call()
    {
        return $this->belongsTo(Call::class);
    }

    public function inviter()
    {
        return $this->belongsTo(User::class, 'inviter_id');
    }

    public function invitee()
    {
        return $this->belongsTo(User::class, 'invitee_id');
    }
}

