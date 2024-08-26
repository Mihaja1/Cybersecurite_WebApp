<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $table = 'article';

    public $timestamps = false;

    protected $primary_key = ['id'];
    protected $fillable = ['nom', 'description', 'prix', 'created_at'];

}
