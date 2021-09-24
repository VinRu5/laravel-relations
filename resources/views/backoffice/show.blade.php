@extends('layouts.template')


@section('main')

<div class="container">
    {{ $article->title }}
    @foreach ($article->tag as $tag)
        {{ $tag->name }}
    @endforeach


</div>


@endsection