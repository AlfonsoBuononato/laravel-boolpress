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
        <form action="{{route('admin.posts.update', $posts->id)}}" method="POST">
            @csrf
            @method('PATCH')
            <div class="container">
                <label for="title">title</label>
                <input type="text" name="title" id="title" value="{{old('title', $posts->title)}}">
            </div>
            <div class="container">
                <label for="anno">anno</label>
                <input type="number" name="anno" id="anno" value="{{old('number', $posts->number)}}">
            </div>
            <div class="container">
                <label for="content">content</label>
                <input type="text" name="content" id="content" value="{{old('content', $posts->content)}}">
            </div>

            <div class="container">
                <label for="category_id">category</label>
                <select name="category_id" id="category_id">
                    <option value="">seleziona la tua categoria</option>
                    @foreach ($categories as $category)
                        <option value="{{$category->id}}" @if($category->id == old('category_id')) selected @endif>{{$category->name}}</option>
                    @endforeach    
                </select>                
            </div>

            <button type="submit">EDIT</button>
        </form>
    </div>
@endsection