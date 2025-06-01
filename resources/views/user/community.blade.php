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
    <br />
    <div class="myposts">
      <a href="{{ route('user.posts', ['id' => Auth::id()]) }}">{{ trans('message.My_Posts') }} <img src="{{ asset('img/Community/myposts.svg') }}" alt=""></a>
    </div>
    <br />
    <div class="row create">
      <h4>{{ trans('message.Create_Post') }}</h4>
      @include('errors')
      @include('success')
      <form action="{{ route('store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="input">
          <textarea name="post" id="" required>
            @if(!empty($pro_link))
                {{$pro_link}}
            @endif
          </textarea>
          <img src="img/Community/input.svg" alt="" class="input-img" />
        </div>
        <div class="in-create">
          <div class="increate-img" id="increate-img">
            <img src="img/Community/img.svg" alt="" class="publish-img" /> {{ trans('message.Image') }}
          </div>
          <button type="submit">
            <img src="img/Community/publish.svg" alt="" />
            {{ trans('message.Publish') }}
          </button>
        </div>
        <div class="img" id="img">
          <input type="file" name="image" id="fileInput" class="custom-file-input" onchange="updateFileName(this)">
          <label for="fileInput" class="custom-file-label">+</label>
        </div>
      </form>
    </div>

    @foreach ($posts as $post)
    <div class="row posts">
      <div class="up">
        <div class="name">
          <h5>{{ $post->user->name }}</h5>
          <p>{{ $post->created_at->diffForHumans() }}</p>
        </div>
      </div>

      <div class="text">
        <p>{{ $post->post }}</p>
        @if($post->image)
          <img src="{{asset("storage/$post->image")}}" alt="Post Image">
        @endif
      </div>

      <div class="button">
        <a href="{{ url("/post/$post->id") }}"><img src="img/Community/comment.svg" alt="" /> {{ \App\Models\Comment::where('post_id', $post->id)->count() }} {{ trans('message.Reviews') }}</a>
      </div>
    </div>
    @endforeach




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
