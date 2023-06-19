<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Searchable\Searchable;
use Spatie\Searchable\SearchResult;
use Illuminate\Support\Str;

class TvShow extends Model implements Searchable
{
    use HasFactory;

    protected $fillable = ['tmdb_id', 'name', 'slug', 'poster_path', 'created_year'];

    public function getSearchResult(): SearchResult
    {
        $url = route('series.show', $this->slug);

        return new \Spatie\Searchable\SearchResult(
            $this,
            $this->name,
            $url
        );
    }
 
    public function setNameAttribute($value)
    {
        $this->attributes['name'] = $value;
        $this->attributes['slug'] = Str::slug($value);
    }

    public function seasons()
    {
        return $this->hasMany(Season::class);
    }
}
