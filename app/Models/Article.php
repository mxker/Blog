<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'article';
    protected $primaryKey = 'art_id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'art_id', 'art_name', 'cate_id', 'art_tag', 'art_desc', 'art_content','art_thumb','art_time','update_time',
        'art_editor','art_view','is_hot','is_mark'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    protected $appends = [
        'cate_name'
    ];

    public function getCateNameAttribute(){
        return Category::query()->where('cate_id',$this->attributes['cate_id'])->value('cate_name');
    }
}
