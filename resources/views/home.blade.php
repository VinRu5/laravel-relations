@extends('layouts.template')

@section('main')

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="row justify-content-center align-items-center">
                <div class="home-img col-2">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 221.78 181.78">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: #494949;
                                }

                            </style>
                        </defs>
                        <g id="Livello_2" data-name="Livello 2">
                            <g id="Livello_1-2" data-name="Livello 1">
                                <path class="cls-1"
                                    d="M202.26,37.26V181.14c10.49-3.63,17.92-22.71,19.52-27.21V37.28Z" />
                                <path class="cls-1"
                                    d="M0,181.78H198.42V0H0Zm92.17-14.89H13.44v-6.24H92.17Zm0-18.24H13.44v-6.24H92.17Zm0-18.24H13.44v-6.24H92.17Zm0-18.24H13.44v-6.24H92.17Zm0-18.24H13.44V87.69H92.17Zm92.17,73H105.61v-6.24h78.73Zm0-18.24H105.61v-6.24h78.73Zm0-18.24H105.61v-6.24h78.73Zm0-18.24H105.61v-6.24h78.73Zm0-18.24H105.61V87.69h78.73ZM147.23,42.61q-1.83-1.74-5.5-5.21a23.34,23.34,0,0,1-4.35-5.33A12.36,12.36,0,0,1,136,26.3q0-5.6,3.76-8.48a9.34,9.34,0,0,1,5.76-1.73,10.46,10.46,0,0,1,5.66,1.47,8.44,8.44,0,0,1,3,3.21,12.08,12.08,0,0,1,1.36,4.75l-5.93,1.08a7.09,7.09,0,0,0-1.44-3.93,3,3,0,0,0-2.46-1,2.83,2.83,0,0,0-2.59,1.51,5.82,5.82,0,0,0-.72,3,9.07,9.07,0,0,0,2.42,5.73,21.73,21.73,0,0,0,2.75,2.62q2.16,1.8,2.85,2.52a21.54,21.54,0,0,1,3.54,4.52,20,20,0,0,1,.95,1.93,11.33,11.33,0,0,1-1.32,11.25,8,8,0,0,1-4.25,2.91,11.51,11.51,0,0,1-3.44.46,9.72,9.72,0,0,1-6-1.8,10,10,0,0,1-3.16-4,16.48,16.48,0,0,1-1.36-5.81l5.89-.43a9.06,9.06,0,0,0,1.9,5.2,3.19,3.19,0,0,0,2.56,1.15,3.83,3.83,0,0,0,3.24-2,5,5,0,0,0,.62-2.71A7.39,7.39,0,0,0,147.23,42.61Zm-44.11-26,3.25,22,3-22h6.48l3.24,22,3-21.95h6.49l-6.41,41h-5.89L112.72,35,109.43,57.6h-5.92l-6.87-41Zm-32,0H88.7v6.22H77.27V34h8.35v6.22H77.27V51.38H88.7V57.6H71.09Zm-30.56,0h6.95l8.21,27.58V16.56h6.19V57.61H55.24L46.72,31.33V57.61H40.54v-41ZM13.12,66.89H184.66v7H13.12Z" />
                            </g>
                        </g>
                    </svg>
                </div>
                <h1 class="home-title">
                    <span class="italic">the</span>
                    <span class="bold">NEWS</span>
                </h1>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="article-container col-12">
            <div class="row justify-content-center">
                <div class="col-12 col-md-8">
                    <div class="article">
                        <a href="{{ route('articles.show', $articles[0]) }}">
                            <h2 class="article-title">{{ ucfirst($articles[0]->title) }}</h2>
                        </a>
                        <img src="{{ $articles[0]->photo }}" alt="photo articolo {{ $articles[0]->id }}">
                        <p class="article-text">
                            {{ $articles[0]->text }}
                        </p>
                        <div class="article-footer">
                            <div class="article-footer-author">{{ $articles[0]->author->name }}
                                {{ $articles[0]->author->surname }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @foreach ($articles as $article)
            <div class="article-container col-6 col-md-4 col-lg-2">
                <div class="article">
                    <a href="{{ route('articles.show', $article) }}">
                        <h2 class="article-title">{{ ucfirst($article->title) }}</h2>
                    </a>
                    @if(strlen($article->photo) > 0)
                    <img src="{{ $article->photo }}" alt="photo articolo {{ $article->id }}">
                    @endif
                    <p class="article-text">
                        {{ $article->text }}
                    </p>
                    <div class="article-footer">
                        <div class="article-footer-author">
                            {{ $article->author->name }}
                            {{ $article->author->surname }}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

@endsection
