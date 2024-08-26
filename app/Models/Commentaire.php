<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaire extends Model
{
    use HasFactory;

    protected $table = 'commentaire';

    public $timestamps = false;

    protected $primary_key = ['id'];
    protected $fillable = ['idArticle', 'idUser', 'texte', 'created_at'];


    public function article(){
        return $this->belongsTo(Article::class, 'idarticle');
    }

    public function user(){
        return $this->belongsTo(User::class, 'iduser');
    }
}
