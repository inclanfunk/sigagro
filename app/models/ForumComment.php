<?php


class ForumComment extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'forum_comments';

	public function user()
	{
		return $this->belongsTo('User');
	}


	public function category()
	{
		return $this->belongsTo('ForumCat');
	}


	public function thread()
	{
		return $this->belongsTo('ForumThread');
	}





}
