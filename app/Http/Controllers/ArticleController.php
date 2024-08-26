<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Commentaire;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    public function all(){

        $articles = Article::all();

        return view('dashboard', ['articles' => $articles]);
    }


    public function details($id) {

        $article = Article::find($id);
        $comments = Commentaire::where('idarticle', $id)
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('details', compact('article', 'comments'));
    }


}
