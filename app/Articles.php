<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $table = "articles";
	protected $guarded = ['id'];
	protected $dates = ['published_at']; 
 
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class)->with('user')->orderBy('id');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function images()
    {
        return $this->belongsToMany(Image::class, 'article_image');
    }

    public function scopeNotDeleted(Builder $builder)
    {
        return $builder->where('is_deleted', 0);
    }

    public function scopePublished(Builder $builder)
    {
        return $builder->where('is_published', 1);
    }

    public function getPublishedAtHumanAttribute()
    {
        return $this->published_at->diffForHumans();
    }

    public function getCreatedAtHumanAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getUpdatedAtHumanAttribute()
    {
        return $this->updated_at->diffForHumans();
    }

    public function getCategoryNameAttribute()
    {
        return optional($this->category)->name;
    }

    public function getContentAsHtmlAttribute()
    {
        $converter = new CommonMarkConverter();
        echo $converter->convertToHtml($this->content);
    }

    public static function getPaginate(Request $request)
    {
        $perPage = config('view.item_per_page');

        $categoryAlias = $request->route('categoryAlias');
        $keywordName = $request->route('keywordName');

        if (!is_null($categoryAlias)) {
            $category = Category::where('alias', $categoryAlias)->first();
            if (is_null($category)) {
                return collect([]);
            }
            $articleQuery = Article::where('category_id', $category->id);
        } elseif (!is_null($keywordName)) {
            $keyword = Keyword::where('name', $keywordName)->first();
            if (is_null($keyword)) {
                return collect([]);
            }
            $articleIds = $keyword->articles->pluck('id')->toArray();
            $articleQuery = Article::whereIn('id', $articleIds);
        } else {
            $articleQuery = Article::published()->notDeleted();
        }

        $paginateUrl = '';
        if ($request->has('lang')) {
            $articleQuery = $articleQuery->where('language', $request->lang);
            $paginateUrl = '?lang=' . $request->lang;
        }

        $articles = $articleQuery->with('category', 'keywords', 'user')
            ->latest()
            ->paginate($perPage)
            ->withPath($paginateUrl);

        return $articles;
    }
}
