<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Call extends Model
{
    protected $fillable = ['host_id', 'channel_name'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function invites()
    {
        return $this->hasMany(CallInvite::class);
    }
}

