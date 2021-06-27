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
                <label for="content">content</label>
                <input type="text" name="content" id="content" value="{{old('content')}}">
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

            {{-- TAGS --}}
            <div class="tags">
            @foreach ($tags as $tags)
                <input type="checkbox" name="tags[]" id="tag-{{$tag->id}}"
                    value="{{$tag->id}}" 
                    @if (in_array($tag->id, old('tags', []))) checked @endif 
                >
                <label for="tag-{{$tag->id}}">{{$tag->name}}</label>
            @endforeach
            </div>

            <button type="submit">CREATE</button>
        </form>
    </div>
@endsection