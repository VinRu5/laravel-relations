<?php

namespace App\Http\Controllers;

use App\Article;
use App\Author;
use App\Tag;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BackOfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $tags = Tag::all();
        return view('backoffice.create', compact('authors', 'tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validateArticle($request);
        $data = $request->all();
        
        $newArticle = new Article();
        $newArticle->title = $data['title'];
        $newArticle->text = $data['text'];
        $newArticle->photo = $data['photo'];
        $newArticle->author_id = $data['author_id'];
        $newArticle->save();
        
        if(array_key_exists('tag', $data)) {
            
            foreach($data['tags'] as $tag) {
                $newArticle->tag()->attach($tag);
            }
        }

        return redirect()->route('articles.show', $newArticle);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        $dateArticle = new Carbon($article->created_at);
        return view('backoffice.show', compact('article', 'dateArticle'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function validateArticle(Request $request) {
        $request->validate([
            'title' => 'required|max:100',
            'text' => 'required',
            'photo' => 'nullable|url',
            'author_id' => 'required'
        ]);
    }
}
