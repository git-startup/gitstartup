<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = "categories";
    protected $guarded = ['id'];

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function parent()
    {
        return $this->hasMany(Category::class, 'parent_category_id');
    }

    public function children()
    {
        return $this->belongsTo(Category::class, 'parent_category_id');
    }


    public static function getNonEmptyOnly()
    {
        return Category::whereHas('articles')->active()->get();
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', 1);
    }
}
