<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UpdateNewsRequest;
use App\Models\News;
use App\Models\Category;
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
            'news' => News::orderByDesc('id')->paginate(4),
            'newsCategory' => Category::all(),
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
                'newsCategory' => Category::all(),
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
        $news = News::create($request->all());
        if ($request->hasFile('image')) {
            $path = \Storage::putFile('public', $request->file('image'));
            $news->image = \Storage::url($path);
            $news->save();
        }
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
            'newsCategory' => Category::all(),
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
        return view('admin.edit', [
                'newsCategory' => Category::all(),
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
    // можно использовать класс Request: UpdateNewsRequest
    //для проверки правил
    // В данном случае используется middleware    NewsValidate
    public function update(Request $request, News $news)
    {

        $news->update($request->all());
        $request->flash();
        if ($request->hasFile('image')) {
            $path = \Storage::putFile('public', $request->file('image'));
            $news->image = \Storage::url($path);
            $news->save();
        }
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
        $news->delete();
        return redirect(route('admin.news.index'))->with('warning', 'Новость успешно удалена');
    }
}
