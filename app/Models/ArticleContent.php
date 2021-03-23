<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ArticleContent extends Model
{
    protected $table = 'article_content';
    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','article_id','content',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];
}
