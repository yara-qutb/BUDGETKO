@extends('user.layout')

{{-- Head --}}

@section('title')
  Community
@endsection

@section('cssLinks')
  <link rel="stylesheet" href="{{ asset('asset/css/community.css') }}" />
@endsection

{{-- End head --}}

{{-- Body --}}
@section('body')

<div class="community">

  <div class="container">
    <br>
    <div class="myposts">
      <form action="{{ route('deleteAllPosts') }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">{{ trans('message.delete_all') }} <img src="{{ asset('img/nav/Vector.svg') }}" alt=""></button>
      </form>
      <a href="/community">{{ trans('message.Community') }}</a>
    </div>
    <br />
    <h3>{{ trans('message.welcome') }} {{ $userName }}.</h3>
    @include('success')
    @if($posts->isEmpty())
      <p>{{ trans('message.no_post') }}</p>
    @else
      @foreach ($posts as $post)
        <div class="row posts">
          <div class="up">
            <div class="name">
              <h5>{{ $post->user->name }}</h5>
              <p>{{ $post->created_at->diffForHumans() }}</p>
            </div>
            <div class="delete">
              <form action="{{ route('deleteOnePost', ['id' => $post->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">X</button>
              </form>
            </div>
          </div>
          
          <div class="text">
            <p>{{ $post->post }}</p>
            <img src="{{ asset("storage/$post->image") }}" alt="" />
          </div>
          <div class="button">
            <a href="{{ url("/post/$post->id") }}"><img src="img/Community/comment.svg" alt="" /> {{ \App\Models\Comment::where('post_id', $post->id)->count() }} {{ trans('message.Reviews') }}</a>
          </div>
        </div>
      @endforeach
    @endif
  </div>
  
  <br />
</div>


@endsection
{{-- End Body --}}

{{-- Footer --}}
@section('jsLinks')
<script src="{{ asset('asset/js/community.js') }}"></script>
@endsection
{{-- End Footer --}}