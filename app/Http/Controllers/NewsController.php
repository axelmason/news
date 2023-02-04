<?php

namespace App\Http\Controllers;

use App\Http\Requests\News\CreateRequest;
use App\Http\Requests\News\UpdateRequest;
use App\Models\News;
use Auth;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('index', compact('news'));
    }

    public function createPage()
    {
        return view('create');
    }

    public function create(CreateRequest $r)
    {
        $data = $r->validated();

        News::create($data);

        return to_route('home');
    }

    public function updatePage($news_id)
    {
        $news = News::findOrFail($news_id);
        return view('update', compact('news'));
    }

    public function update(UpdateRequest $r, $news_id)
    {
        $data = $r->validated();

        News::findOrFail($news_id)->update($data);

        return to_route('home');
    }

    public function show($news_id)
    {
        $news = News::findOrFail($news_id);

        return view('show', compact('news'));
    }

    public function delete($news_id)
    {
        News::destroy($news_id);

        return to_route('home');
    }
}
