@extends('layouts.app')

@section('content')
@if (session('deleted'))
    <div class="alert">
        <strong>{{session('deleted')}}</strong>
        deleted succesfully
    </div>
@endif
    <h1>Post</h1>
    <h2><a href="{{ route('admin.posts.create') }}">CREA UN NUOVO POST</a></h2>
    <div class="container">
        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>title</th>
                    <th>anno</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    <tr>
                        <td>{{$post->id}}</td>
                        <td>{{$post->title}}</td>
                        <td>{{$post->anno}}</td>
                        <td><a href="{{ route('admin.posts.show', $post->id) }}">DETTAGLI</a></td>
                        <td><a href="{{route('admin.posts.edit', $post->id)}}">EDIT</a></td>
                        <td>
                            <form action="{{route('admin.posts.destroy', $post->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="delete">
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection