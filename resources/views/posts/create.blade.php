@extends('layouts.app')
@section('content')
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
                    Quote
                </div>
                <div class="card-body">
                    <blockquote class="blockquote mb-0">
                        <p>{{ $post->content }}</p>
                    </blockquote>

                    <hr>

                    <button class="btn btn-outline-primary">Like <span
                            class="badge text-bg-primary">2</span></button>
                    <a href="url {{ 'posts/' . $post->id . '/edit' }}" class="btn btn-success"> Edit</a>




                </div>
            </div>
        @endforeach
    @endif

        

    @endsection