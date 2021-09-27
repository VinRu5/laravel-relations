@extends('layouts.template')


@section('main')

    <div class="row">
        <h1 class="article-title col-12">{{ ucfirst($article->title) }}</h1>
        <div class="article-container col-12">
            <div class="article">
                <div class="row justify-content-center">
                    @isset($article->photo)
                        <div class="col-8">
                            <img src="{{ $article->photo }}" alt="photo articolo {{ $article->id }}">
                        </div>
                    @endisset
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

                            <span
                                class="chips chips-text
                               @include('backoffice.switchChips')
                                ">
                                #{{ $tag->name }}
                            </span>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>

    </div>
    <div id="app">
        <Comments />
    </div>


@endsection
