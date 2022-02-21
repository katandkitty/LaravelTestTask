<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::orderBy('id', 'DESC')->paginate(10);
        $articles->withPath('/articles');
        return view('articles.index', [
            'articles' => $articles,
        ]);
    }

    /**
     * Send data to main page.
     *
     * @return \Illuminate\Http\Response
     */
    public function main_page()
    {
        $articles = Article::orderBy('id', 'desc')->take(6)->get();
        return view('main', [
            'articles' => $articles,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function like(Request $request)
    {
        $article_id = $request->article_id;
        $article = Article::find($article_id);
        $likes = $article->likes + 1;

        DB::beginTransaction();
        try {
            DB::update('update articles set likes ='.$likes.' where id ='.$article_id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->$e;
        }

        return response()->json(['likes'=>$likes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function view(Request $request)
    {
        $article_id = $request->article_id;
        $article = Article::find($article_id);
        $views = $article->views + 1;

        DB::beginTransaction();
        try {
            DB::update('update articles set views ='.$views.' where id ='.$article_id);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollback();
            return response()->$e;
        }

        return response()->json(['views'=>$views]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function comment(Request $request)
    {
        $theme_comment = $request->theme_comment;
        $body_comment = $request->body_comment;
        if (!$theme_comment || !$body_comment) return response()->json(['error'=> 'ValidationException']);
        //throw ValidationException::withMessages(['$theme_comment' => 'Заполните тему комментария!', '$body_comment' => 'Напишите текст комментария!']);
        //elseif (!$theme_comment) throw ValidationException::withMessages(['$theme_comment' => 'Заполните тему комментария!']);
        //elseif (!$body_comment) throw ValidationException::withMessages(['$body_comment' => 'Напишите текст комментария!']);
        return response()->json(['success'=> 1]);
        sleep(600);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        return view('articles.show', [
            'article' => $article,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
