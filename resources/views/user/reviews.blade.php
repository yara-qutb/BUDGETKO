@extends('user.layout')

{{-- Head --}}

@section('title')
  Comments
@endsection

@section('cssLinks')
  <link rel="stylesheet" href="{{ asset('asset/css/community.css') }}" />
  <link rel="stylesheet" href="{{ asset('asset/css/reviews.css') }}" />
@endsection

{{-- End head --}}

{{-- Body --}}
@section('body')

<div class="community">
  <div class="container">
    <br />
    <br />

      <div class="row posts">
          <div class="link"><a href="/community">X</a></div>
          <div class="name">
            <h5>{{ $post->user->name }}</h5>
            <p>{{ $post->created_at->diffForHumans() }}</p>
          </div>
          <div class="text">
            <p>{{ $post->post }}</p>
            <img src="{{ asset("storage/$post->image") }}" alt="" />
          </div>
          <hr />
          @foreach($comments as $comment)
            <div class="comments">
                <div class="name">
                    <h5>{{ $comment->user->name }}</h5>
                    <p>{{ $comment->created_at->diffForHumans() }}</p>
                </div>
                <div class="text">
                    <p>{{ $comment->comment }}</p>
                </div>
            </div>
          @endforeach
          <form action="{{ route('post.comment', ['id' => $post->id]) }}" method="post">
            @csrf
            <input type="text" name="comment" placeholder="{{ trans('message.input') }}" />
            <button type="submit">
              <img src="{{ asset('img/Community/send.svg') }}" alt="" /> {{ trans('message.send') }}</button>
          </form>
      </div>

  </div>
  <br />
</div>

@endsection
{{-- End Body --}}
