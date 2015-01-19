<?php


class ForumCat extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'forum_cats';

	public function user()
	{
		return $this->belongsTo('User');
	}




	public function threads(){

		return $this->hasMany('ForumThread' , 'cat_id');
	}



	public function comments(){

		return $this->hasMany('ForumComment' , 'cat_id');
	}


}
