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
            <br/>
            <br/>
            <br/>
        </div>

        <div class="row main-page">
            <form method="get" action="{{ route('budget') }}" class="the-form">
                @csrf
                @if (session('lang') == 'ar')
                    <div class="hed-search" style="width: 37%">
                @else
                    <div class="hed-search" style="width: 47%">
                @endif
                <h2>{{ trans('message.Add_your_Budget') }} </h2>
                <input class="search-num" name="main_budget" type="number" name="" id="" />

                 </div>
                @include('errors')
                <div class="main-search">
                    <div class="type">
                        <span>{{ trans('message.Device_Type') }}</span>
                        <span>{{ trans('message.price') }}</span>
                    </div>
                    <div class="the-search search1">
                        <input class="search-text" type="text" name="key1" id="myinput1" value="" />
                        <div class="sec-btn">
                            <input type="number" class="search-text" name="budget1">
                        </div>
                    </div>
                    <div class="the-search search2" style="display: none">
                        <input class="search-text" type="text" name="key2" id="myinput2" />
                        <div class="sec-btn">
                            <input type="number" class="search-text" name="budget2">

                        </div>
                    </div>
                    <div class="the-search search3" style="display: none">
                        <input class="search-text" type="text" name="key3" id="myinput3" />
                        <div class="sec-btn">
                            <input type="number" class="search-text" name="budget3">

                        </div>
                    </div>
                    <div class="the-search search4" style="display: none">
                        <input class="search-text" type="text" name="key4" id="myinput4" />
                        <div class="sec-btn">
                            <input type="number" class="search-text" name="budget4">

                        </div>
                    </div>
                    <div class="the-search search5" style="display: none">
                        <input class="search-text" type="text" name="key5" id="myinput5" value="" />
                        <div class="sec-btn">
                            <input type="number" class="search-text" name="budget5">

                        </div>
                    </div>
                    <div class="the-search search6" style="display: none">
                        <input class="search-text" type="text" name="key6" id="myinput6" value="" />
                        <div class="sec-btn">
                            <input type="number" class="search-text" name="budget6">

                        </div>
                    </div>
                    <div class="add-btn btn">{{ trans('message.Add_More') }} +</div>
                </div>
                <div class="next-btn">
                    <button type="submit" class="btn">{{ trans('message.Next') }}</button>
                </div>
            </form>
        </div>
    </div>
@endsection
{{-- End Body --}}
