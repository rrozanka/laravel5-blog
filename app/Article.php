<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Article
 *
 * @package App
 */
class Article extends Model {

    /**
     * @var string
     *
     */
	protected $table = 'articles';

    /**
     * @var array
     *
     */
    protected $fillable = [
        'title', 'body', 'excerpt', 'published_at'
    ];

    /**
     * @var array
     *
     */
    protected $dates = [
        'published_at'
    ];

    /**
     * User relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Category relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    /**
     * Tags relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tags()
    {
        return $this->belongsToMany('App\Tag');
    }

    /**
     * Get published at parsed attribute.
     *
     * @return string
     */
    public function getPublishedAtParsedAttribute()
    {
        return Carbon::parse($this->attributes['published_at'])->format('Y-m-d');
    }

    /**
     * Set published at attribute.
     *
     * @param $date
     */
    public function setPublishedAtAttribute($date)
    {
        $this->attributes['published_at'] = Carbon::parse($date);
    }

    /**
     * Get tags list attribute.
     *
     * @return mixed
     */
    public function getTagsListAttribute()
    {
        return $this->tags->lists('id');
    }

}
