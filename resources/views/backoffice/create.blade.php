@extends('layouts.template')


@section('main')

    <div class="create-form">
        @if ($flagShow)
            edit
        @endif

        <h2 class="title-form">Aggiungi Articolo</h2>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        
        @if($flagShow)
        <form action="{{ route('articles.update', $article) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        @else
        <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
        @endif

            <div class="form-group">
                <label class="label-check" for="title">
                    Titolo Articolo
                </label>
                <input type="text" class="form-control" name="title" id="title" @if ($flagShow)
                value="{{ $article->title }}"
                @endif>
            </div>

            <div class="form-group">
                <label class="label-check" for="author_id">Autore</label>
                <select class="custom-select" name="author_id" id="author_id">
                    <option>Clicca qui per selezionare l'autore...</option>

                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}" @if ($flagShow)
                            @if ($article->author_id === $author->id)
                                {{ 'selected' }}
                            @endif
                    @endif
                    >{{ ucfirst($author->name) }} {{ ucfirst($author->surname) }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="label-check" for="text">Scrivi il tuo Articolo</label>
                <textarea name="text" class="form-control" id="text" cols="30" rows="10">
                            @if ($flagShow)
                                {{ $article->text }}"
                            @endif
                        </textarea>
            </div>

            <div class="form-group">
                <label class="label-check" for="photoFile">Carica la foto</label>
                <input type="file" class="form-control" name="photoFile" id="photoFile" @if ($flagShow)
                value="{{ $article->photo }}"
                @endif
                >
            </div>

            <div class="form-group">
                <label class="label-check">Aggiungi i tuoi tag</label>
            </div>
            <div class="form-group row">
                @foreach ($tags as $tag)
                    <div class="col-6 col-sm-4 col-md-3">
                        <span class="chips @include('backoffice.switchChips')">
                            <input type="checkbox" class="" id=" author{{ $loop->iteration }}" name="tags[]"
                                value="{{ $tag->id }}" 
                                @if ($flagShow)
                                    @foreach($article->tag as $tagArticle)

                                        @if ($tagArticle->id === $tag->id)
                                            {{ 'checked' }}
                                        @endif
                                    @endforeach
                                @endif
                            >
                            <label class="chips-text" for="author{{ $loop->iteration }}">#{{ $tag->name }}</label>
                        </span>
                    </div>
                @endforeach
            </div>

            <div class="form-group">
                <button type="submit" class="button-custom button-custom-grey">
                    @if ($flagShow)
                        Modifica
                    @else
                        Pubblica
                    @endif
                </button>
            </div>

        </form>
    </div>


@endsection
