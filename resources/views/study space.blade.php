@extends('layouts.app')

@section('content')
<div class="vc-container">

  <div class="vc-top">
    @foreach ($participants->where('id', '!=', $user->id)->take(4) as $participant)
      <div class="lemonade-stand">
        <div class="vc-box">{{ $participant->name }}</div>
      </div>
    @endforeach

    {{-- Fill empty slots if less than 4 --}}
    @for ($i = $participants->count() - ($participants->contains($user->id) ? 1 : 0); $i < 4; $i++)
      <div class="lemonade-stand-wrapper">
  <img src="{{ asset('images/lemonaidstand.png') }}" alt="Lemonade Stand" class="lemonade-image">
  <div class="vc-box-content">Alice</div>
    @endfor
  </div>

  <div class="vc-center">
    {{-- No timer as per your latest instructions --}}
  </div>

  <div class="vc-bottom">
    <div class="vc-box user-box">{{ $user->name }}</div>
    <div class="drink-overlay"></div>
  </div>

  <div class="vc-controls">

    @if (!$inVC)
      <form method="POST" action="{{ route('vc-room.join') }}" style="display:inline;">
        @csrf
        <button type="submit">Join VC</button>
      </form>
    @else
      <form method="POST" action="{{ route('vc-room.leave') }}" style="display:inline;">
        @csrf
        <button type="submit">Leave VC</button>
      </form>
    @endif

    <form method="POST" action="{{ route('vc-room.invite') }}" style="display:inline; margin-left: 10px;">
      @csrf
      <input type="email" name="email" placeholder="Invite email" required />
      <button type="submit">Invite</button>
    </form>
  </div>

  {{-- Flash messages --}}
  @if(session('success'))
    <div class="alert success">{{ session('success') }}</div>
  @endif

  @if(session('error'))
    <div class="alert error">{{ session('error') }}</div>
  @endif

</div>
@endsection

@section('styles')
<link rel="stylesheet" href="{{ asset('css/studyspace.css') }}">
@endsection
