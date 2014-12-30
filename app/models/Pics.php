<?php


class Pics extends Eloquent {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'pics';

	protected $fillable = array('name', 'user_id');

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */


	public function user()
	{
		return $this->belongsTo('User');
	}








}
