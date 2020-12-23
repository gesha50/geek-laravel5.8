<?php

namespace App\Http\Controllers\Admin;

use App\Library\NewsParser;
use App\Library\Translit;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Orchestra\Parser\Xml\Facade as XmlParser;
use Parser;

class ParserController extends Controller
{
    public function index()
    {
      $links = \DB::table('resources')->get();
      foreach ($links as $link){
          // реализация через service provider и interface
//          app(NewsParser::class)->parse($link->link);

          // реализация через  Facades
          Parser::parse($link->link);

      }
      return redirect()->route('admin.news.index')->with('success', 'Новости успешно добавлены!');
    }
}
