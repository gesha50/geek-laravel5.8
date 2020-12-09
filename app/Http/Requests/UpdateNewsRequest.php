<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;

class UpdateNewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        //нужно поменять позже!!!
        return true ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $categoriesTable = (new Category())->getTable();
        return [
            'image' => 'image',
            'category_id'  => "required|integer|exists:{$categoriesTable},id",
            'is_private' => 'min:0|max:1',
            'title' => 'required',
            'spoiler' => 'required',
            'description' => 'required'
        ];
    }
}
