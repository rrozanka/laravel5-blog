<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Tag
 *
 * @package App
 */
class Tag extends Model {

	/**
	 * @var string
	 *
	 */
	protected $table = 'tags';

	/**
	 * @var array
	 *
	 */
	protected $fillable = [
		'name'
	];

	/**
	 * Articles relation.
	 *
	 * @return \Illuminate\Database\Eloquent\Relations\HasMany
	 */
	public function articles()
	{
		return $this->belongsToMany('App\Article');
	}

}
