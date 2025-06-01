@extends('user.layout')

{{-- Head --}}

@section('title')
  Profile
@endsection

@section('cssLinks')
    <link rel="stylesheet" href="{{ asset('asset/css/profile.css') }}" />
@endsection

{{-- End head --}}

{{-- Body --}}

  @section('body')
    <div class="container">
      <br />
      <br />
      <div class="profile">
        <h3>{{ $user->name }}</h3>
        <h4>{{ trans('message.profile_info') }}</h4>
        <!-- profile.blade.php -->

<form method="POST" action="{{ url('/profile/update') }}" class="form-info">
  @csrf
  @method('PUT')
  <div class="info">
      <input type="text" name="name" placeholder="{{ trans('message.Full Name') }}" value="{{ $user->name }}" />
      <input type="email" name="email" placeholder="{{ trans('message.email') }}" value="{{ $user->email }}" />
      <input type="number" name="phone" placeholder="{{ trans('message.phone') }}" value="{{ $user->phone }}" />
      <input type="text" name="address" placeholder="{{ trans('message.address') }}" value="{{ $user->address }}" />
      <div class="button">
          <button type="submit" class="btn-save">{{ trans('message.savechanges') }}</button>
      </div>
  </div>
</form>

{{-- <form id="profileForm" class="form-info">
  @csrf
  @method('PUT')
  <div class="info">
      <input type="text" id="name" name="name" placeholder="{{ trans('message.Full Name') }}" value="{{ $user->name }}" />
      <input type="email" id="email" name="email" placeholder="{{ trans('message.email') }}" value="{{ $user->email }}" />
      <input type="number" id="phone" name="phone" placeholder="{{ trans('message.phone') }}" value="{{ $user->phone }}" />
      <input type="text" id="address" name="address" placeholder="{{ trans('message.address') }}" value="{{ $user->address }}" />
      <div class="button">
          <button type="button" id="saveChangesBtn" class="btn-save">{{ trans('message.savechanges') }}</button>
      </div>
  </div>
</form> --}}


        <form action="logout" method="POST" class="form-log">
          @csrf
          <button type="submit" class="btn-log">
            @if (session('lang') == "ar")
            <span style="width: 85%;">
              <i class="fa-solid fa-arrow-right-from-bracket"></i>
            @else
            <span style="width: 50%;">
              <i class="fa-solid fa-arrow-right-from-bracket fa-flip-horizontal"></i>
            @endif
              {{ trans('message.logout') }}
            </span>
          </button>
        </form>
      </div>
    </div>
  @endsection

{{-- End Body --}}

@section('jsLinks')
  {{-- <script src="asset/js/profile.js"></script> --}}
@endsection