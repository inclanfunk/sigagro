<?php


class ForumThread extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'forum_threads';


	public function user()
	{
		return $this->belongsTo('User');
	}

	public function category()
	{
		return $this->belongsTo('ForumCat');
	}

	public function comments(){

		return $this->hasMany('ForumComment' , 'thread_id');
	}




}
