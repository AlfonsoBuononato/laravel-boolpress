@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{route('admin.posts.store')}}" method="POST">
            @csrf
            @method('POST')
            <div class="container">
                <label for="title">title</label>
                <input type="text" name="title" id="title">
            </div>
            <div class="container">
                <label for="anno">anno</label>
                <input type="number" name="anno" id="anno">
            </div>
            <div class="container">
                <label for="content">content</label>
                <input type="text" name="content" id="content">
            </div>

            <button type="submit">CREATE</button>
        </form>
    </div>
@endsection