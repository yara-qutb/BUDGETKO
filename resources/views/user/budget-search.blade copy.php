@extends('user.layout')

{{-- Footer --}}
@section('jsLinks')
  <script src="{{ asset('asset/js/btns.js') }}"></script>
  <script src="{{ asset('asset/js/budget-search.js') }}"></script>
@endsection
{{-- End Footer --}}

{{-- Head --}}

@section('title')
  Budget Search
@endsection

@section('cssLinks')
  <link rel="stylesheet" href="{{ asset('asset/css/budget-search.css') }}" />
@endsection

{{-- End head --}}

{{-- Body --}}
@section('body')
<div class="container">
    <div>
      <br />
      <br />
      <br />
    </div>
    <div class="row main-page">
      <form method="POST" action="{{route('budget')}}" class="the-form">
        @csrf
        @if (session('lang') == "ar")
        <div class="hed-search" style="width: 37%">
        @else
        <div class="hed-search" style="width: 47%">
        @endif
        <h2>{{ trans('message.Add_your_Budget') }}</h2>
          <input class="search-num" name="budget" type="number" name="" id="" />
        </div>
        <div class="main-search">
          <div class="type">
            <span>{{ trans('message.Device_Type') }}</span>
            <span>{{ trans('message.Number') }}</span>
          </div>
          <div class="the-search search1">
              <input class="search-text" type="text" name="key1" id="myinput1" value="" />
            <div class="sec-btn">
              <input type="number" name="" id="">
            </div>
          </div>
          {{-- <div class="the-search search2" style="display: none">
              <input class="search-text" type="text" name="key2" id="myinput2" />
            <div class="sec-btn">
              <div class="minus-btn">-</div>
              <div class="num">1</div>
              <div class="plus-btn">+</div>
            </div>
          </div>
          <div class="the-search search3"  style="display: none">
              <input class="search-text" type="text" name="key3" id="myinput3" />
            <div class="sec-btn">
              <div class="minus-btn">-</div>
              <div class="num">1</div>
              <div class="plus-btn">+</div>
            </div>
          </div>
          <div class="the-search search4"  style="display: none">
            <input class="search-text" type="text" name="key4" id="myinput4" />
            <div class="sec-btn">
              <div class="minus-btn">-</div>
              <div class="num">1</div>
              <div class="plus-btn">+</div>
            </div>
          </div>
          <div class="the-search search5"  style="display: none">
              <input class="search-text" type="text" name="key5" id="myinput5" value="" />
            <div class="sec-btn">
              <div class="minus-btn">-</div>
              <div class="num">1</div>
              <div class="plus-btn">+</div>
            </div>
          </div> --}}
          <div class="add-btn btn">{{ trans('message.Add_More') }} +</div>
        </div>
        <div class="next-btn">
          <button type="submit"  class="btn">{{ trans('message.Next') }}</button>
        </div>

      </form>
    </div>
  </div>
@endsection
{{-- End Body --}}


