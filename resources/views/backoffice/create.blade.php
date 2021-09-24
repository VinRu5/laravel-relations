@extends('layouts.template')


@section('main')

    <div class="create-form">

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

        <form action="{{ route('articles.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label class="label-check" for="title">Titolo Articolo</label>
                <input type="text" class="form-control" name="title" id="title">
            </div>

            <div class="form-group">
                <label class="label-check" for="author_id">Autore</label>
                <select class="custom-select" name="author_id" id="author_id">
                    <option>Clicca qui per selezionare l'autore...</option>

                    @foreach ($authors as $author)
                        <option value="{{ $author->id }}">{{ ucfirst($author->name) }} {{ ucfirst($author->surname) }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label class="label-check" for="text">Scrivi il tuo Articolo</label>
                <textarea name="text" class="form-control" id="text" cols="30" rows="10"></textarea>
            </div>

            <div class="form-group">
                <label class="label-check" for="photo">Inserisci l'URL dell foto</label>
                <input type="text" class="form-control" name="photo" id="photo">
            </div>

            <div class="form-group">
                <label class="label-check">Aggiungi i tuoi tag</label>
            </div>
            <div class="form-group row">
                @foreach ($tags as $tag)
                <div class="col-3 chips-container">
                    <div class="chips chips-green"></div>
                    <div class="chips-text">
                        <input type="checkbox" class="" id="author{{$loop->iteration}}" name="tags[]" value="{{ $tag->id }}">
                        <label class="tag-check" for="author{{$loop->iteration}}">#{{ $tag->name }}</label>
                    </div>
                </div>
                @endforeach
            </div>

            <div class="form-group">
                <button type="submit" class="button-custom button-custom-grey">Pubblica</button>
            </div>

        </form>
    </div>


@endsection
