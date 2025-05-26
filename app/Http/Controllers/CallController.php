<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Call;
use App\Models\CallInvite;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
 

class CallController extends Controller
{
    public function create(Request $request)
    {
        $user = Auth::user();

        $call = Call::create([
            'host_id' => $user->id,
            'channel_name' => Str::uuid(),
        ]);

        $call->users()->attach($user->id);

        return response()->json($call->load('users'));
    }

    public function invite(Request $request, Call $call)
    {
        $user = Auth::user();

        if ($call->users()->count() >= 5) {
            return response()->json(['error' => 'Call is full'], 400);
        }

        $exists = CallInvite::where([
            ['call_id', '=', $call->id],
            ['invitee_id', '=', $request->invitee_id],
        ])->whereIn('status', ['pending', 'accepted'])->exists();

        if ($exists) {
            return response()->json(['error' => 'User already invited'], 400);
        }

        CallInvite::create([
            'call_id' => $call->id,
            'inviter_id' => $user->id,
            'invitee_id' => $request->invitee_id,
        ]);

        return response()->json(['message' => 'Friend invited']);
    }

    public function join(Request $request, Call $call)
    {
        $user = Auth::user();

        if ($call->users()->count() >= 5) {
            return response()->json(['error' => 'Call is full'], 400);
        }

        // Leave existing call
        DB::table('call_user')->where('user_id', $user->id)->delete();

        // Join new call
        $call->users()->attach($user->id);

        return response()->json([
    'message' => 'Joined call',
    'users' => $call->users()->get() ]);
    }

    public function leave(Call $call)
    {
        $user = Auth::user();
        $call->users()->detach($user->id);

        return response()->json(['message' => 'Left the call']);
    }

    public function show(Call $call)
    {
        return response()->json($call->load(['users', 'invites']));
    }
}

