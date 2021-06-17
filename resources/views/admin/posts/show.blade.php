@extends('layouts.app')

@section('content')
    <ul>
        <li>title: {{ $posts->title }}</li>
        <li>slug: {{ $posts->slug }}</li>
        <li>content: {{ $posts->content }}</li>
        <li>anno: {{ $posts->anno }}</li>
    </ul>
@endsection