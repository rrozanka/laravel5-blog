<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Category
 *
 * @package App
 */
class Category extends Model {

	/**
	 * @var string
	 *
	 */
	protected $table = 'categories';

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
		return $this->hasMany('App\Article');
	}

}
