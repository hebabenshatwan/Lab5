@extends('layouts.app')

@section('content')
    <div class="container bg-white p-3">

        <div class="row">

            <!-- Text area -->
            <label class="form-label mt-3 mb-3 fw-bold fs-2 p-3">Write a post</label>
            <div class="col">
                <form action="{{ route('Post.store') }}" method="POST">
                    @csrf
                    @method('POST')
                    <div class="form-floating">
                        <textarea class="form-control @error('content') border border-danger @enderror" name="content"
                            placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        @error('content')
                            <div class="text-danger">
                                {{ $message }}
                            </div>
                        @enderror
                        <label for="floatingTextarea2">Whats on your mind?</label>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Post</button>




                </form>


            </div>

            <!-- Feed -->
            <div class="col">

                @if ($posts->count() == 0)
                    <div class="p-3 text-white bg-secondary rounded border">
                        There are no posts yet!
                    </div>
                @endif
                @if ($posts->count() > 0)
                    @foreach ($posts as $post)
                        <div class="card my-3">
                            <div class="card-header">
                                {{ $post->user->name }}
                            </div>
                            <div class="card-body">
                                <blockquote class="blockquote mb-0">
                                    <p>{{ $post->content }}</p>


                                </blockquote>

                                <hr>


                                <form action="{{ route('Post.likes', ['post' => $post, 'user' => auth()->user()->id]) }}"
                                    method="POST">
                                    @csrf
                                    @method('POST')
                                    <button class="btn btn-outline-primary">Like <span
                                            class="badge text-bg-primary">{{ $post->likes->count() }} </span></button>
                                    <a href="{{ route('Post.edit', ['id' => $post->id]) }}" class="btn btn-success">
                                        Edit</a>
                                    <a href="{{ 'posts/' . $post->id . '/delete' }}" class="btn btn-danger"> Delete</a>


                                </form>
                                <hr>
                                <label class="form-label">Comments</label>

                                @foreach ($post->comments as $comment)
                                <p>
                                    <strong>{{ $comment->user->name }}:</strong>
                                    {{ $comment->content }}
                                </p>
                                @endforeach

                                <form method="POST" action="{{ route('comments.store', $post) }}">
                                    @csrf
                                    <input type="text" class="form-control" id="comment" name="content">
                                    <hr>
                                    <button class="btn btn-outline-primary" type="submit">Add Comment</button>
                                </form>

                                


                                {{-- <a href="{{ route("Post.edit", ['id' => $post->id]) }}" class="btn btn-success"> Edit</a>
                    <a href="{{ 'post/' . $post->id . '/delete' }}" class="btn btn-danger"> Delete</a> --}}




                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>


    </div>
@endsection
