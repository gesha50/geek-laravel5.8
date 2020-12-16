<?php

namespace App\Http\Middleware;

use App\Models\Category;
use Closure;

class NewsValidate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $categoriesTable = (new Category())->getTable();

        $rules = [
            'image' => 'image',
            'category_id'  => "required|integer|exists:{$categoriesTable},id",
            'is_private' => 'min:0|max:1',
            'title' => 'required',
            'spoiler' => 'required',
            'description' => 'required'
        ];

        $request->validate($rules);

        //тоже самое!!
//        $validator = \Validator::make($request->all( ), $rules);
//        if ($validator->fails()){
//            return redirect()->back()->withInput()->with('errors', $validator->errors());
//        }

        return $next($request);
    }
}
