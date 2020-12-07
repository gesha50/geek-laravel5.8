<?php

namespace App\Http\Controllers\Admin;

use App\Models\News;
use App\Models\CATEGORY;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.allNews', [
            'news' => News::paginate(4),
            'newsCategory' => CATEGORY::getCategory(),
            'isAdmin' => true
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
            return view('admin.add', [
                'newsCategory' => CATEGORY::getCategory(),
                'isAdmin' => true
            ]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $img = '';
        if ($request->hasFile('image')) {
            $path = \Storage::putFile('public', $request->file('image'));
            $img = \Storage::url($path);
        }
        News::addNews($request->all(), $img);
        $request->flash();
        return redirect(route('admin.news.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        return view('admin.oneNews', [
            'oneNews' => $news,
            'newsCategory' => CATEGORY::getCategory(),
            'isAdmin' => true
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit(News $news)
    {
        dd('ok');
        return view('admin.edit', [
                'newsCategory' => CATEGORY::getCategory(),
                'isAdmin' => true,
                'news' => $news
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        $request->flash();
        $newsItem = $request->only([
            'category_id',
            'is_private',
            'title',
            'spoiler',
            'description',
        ]);

//            $newsItem['image'] = '';
        if ($request->hasFile('image')) {
            $path = \Storage::putFile('public', $request->file('image'));
            $newsItem['image'] = \Storage::url($path);
        }
        if (isset($newsItem['is_private'])) {
            $newsItem['is_private'] = 1;
        } else {
            $newsItem['is_private'] = 0;
        }
        $news->fill($newsItem);
        $news->save();

        return redirect(route('admin.news.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy(News $news)
    {
        News::where('id', $news->id)->delete();
        return redirect(route('admin.news.index'));
    }
}
