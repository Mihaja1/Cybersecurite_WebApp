<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employe;
use App\Models\Genre;
use App\Models\Departments;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class CommentaireController extends Controller
{
    public function add(Request $request){

        $request->validate([
            'idArticle' => ['required', 'numeric'],
            'idUser' => ['required', 'numeric'],
            'texte' => ['required', 'string']
        ]);

        DB::insert('insert into commentaire ("idarticle", "iduser", "texte") values (?, ?, ?)', [$request->idArticle, $request->idUser, $request->texte]);

        $a = new ArticleController();
        return $a->details($request->idArticle);

    }


}
