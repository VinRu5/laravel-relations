@extends('layouts.template')


@section('main')

    <div class="container">
        <h1 class="article-title">{{ ucfirst($article->title) }}</h2>
            <div class="article-container col-12">
                <div class="article">
                    <div class="row justify-content-center">
                        <div class="col-8">
                            <img src="{{ $article->photo }}" alt="photo articolo {{ $article->id }}">
                        </div>
                    </div>
                    <p class="article-text">
                        {{ $article->text }}
                    </p>
                    <div class="article-footer">
                        <div class="article-footer-left">
                            <div class="article-footer-author">
                                {{ $article->author->name }}
                                {{ $article->author->surname }}
                            </div>
                            <div class="article-footer-date">{{ $dateArticle->format('d M Y') }}</div>
                        </div>
                        <div class="article-footer-right">
                            @foreach ($article->tag as $tag)

                                <span class="chips chips-green chips-text">
                                    #{{ $tag->name }}
                                </span>

                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

    </div>


@endsection
