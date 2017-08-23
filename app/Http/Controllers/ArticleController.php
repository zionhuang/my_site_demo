<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Mockery\Exception;
//use Request;
use Carbon\Carbon;

class ArticleController extends Controller
{
    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $articles = $this->article->all();
        return view('articles.index',compact('articles'));
    }

    /**
     * @param $id
     * @return mixed
     */
    public function show($id = null)
    {
        $article = $this->article->find($id);
        if (is_null($article)) {
            abort(404);
        }
        return view('articles.show',compact('article'));
    }

    public function create()
    {
        return view('articles.create');
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $input['intro'] = 'intro';
        $input['published_at'] = Carbon::now();
        $result = $this->article->create($input);
        return redirect('/index');
    }

}
