<?php

namespace App\Http\Controllers\Dashboard\Article;

use App\Http\Controllers\Controller;
use App\Http\Resources\ArticleResource;
use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index(){
        return view('dashboard.article.index');
    }
}
