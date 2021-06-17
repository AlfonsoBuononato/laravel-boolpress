@extends('layouts.app')

@section('content')

    <h1>Post</h1>
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
                        <td>EDIT</td>
                        <td>DELETE</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection