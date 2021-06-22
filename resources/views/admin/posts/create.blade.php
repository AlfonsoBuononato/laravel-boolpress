@extends('layouts.app')

@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container">
        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="container">
                <label for="title">title</label>
                <input type="text" name="title" id="title" value="{{old('title')}}">
            </div>
            <div class="container">
                <label for="anno">anno</label>
                <input type="number" name="anno" id="anno" value="{{old('anno')}}">
            </div>
            <div class="container">
                <label for="content">content</label>
                <input type="text" name="content" id="content" value="{{old('content')}}">
            </div>

            <button type="submit">CREATE</button>
        </form>
    </div>
@endsection