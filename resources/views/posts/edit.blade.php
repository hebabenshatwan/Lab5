@extends('layouts.app')
@section('content')

<div class="container"> 
<div class="col">

    
    
    <div class="row">
        
        

        <!-- Text area -->
        <label class="form-label mt-3 mb-3 fw-bold fs-2 p-3">Edit your post</label>
        <div class="col">
            <form action="{{ url('posts/' . $post->id.'/edit') }}" method="POST" value = "{{ $post->id }}">
                @csrf
                @method('PUT')
                <div class="form-floating">
                    <textarea class="form-control @error('content') border border-danger @enderror" name="content"
                         id="floatingTextarea2" style="height: 100px" >{{ $post->content }}</textarea>
                    @error('content')
                        <div class="text-danger">
                            {{ $message }}
                           
                        </div>
                    @enderror
                    <label for="floatingTextarea2">you can write your new update here!</label>
                </div>

                <button type="submit" class="btn btn-primary mt-4">Update</button>
                



            </form>


        </div>
        
  
        </div>
    </div>

    @endsection