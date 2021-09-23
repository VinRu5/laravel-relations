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
        
        <div class="">
            <label for="title">Titolo Articolo</label>
            <input type="text" class="" name="title" id="title">
        </div>

        <div class="">
            <label for="author_id">Autore</label>
            <select class="" name="author_id" id="author_id">
                <option>Clicca qui per selezionare l'autore...</option>

                @foreach ($authors as $author)
                    <option value="{{ $author->id }}">{{ ucfirst($author->name) }} {{ ucfirst($author->surname) }}</option>
                @endforeach
            </select>
        </div>

        <div class="">
            <label for="text">Scrivi il tuo Articolo</label>
            <textarea name="text" class="" id="text" cols="30" rows="10"></textarea>
        </div>
        
        <div class="">
            <label for="photo">Inserisci l'URL dell foto</label>
            <input type="text" class="" name="photo" id="photo">
        </div>

        <div class="">
            <button type="submit">Pubblica</button>
        </div>

    </form>
</div>


@endsection

