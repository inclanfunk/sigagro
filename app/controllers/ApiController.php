<?php

class ApiController extends BaseController {



	public function userDrop(){

		$group = Sentry::findGroupByName('Admin');

		return Sentry::findAllUsersInGroup($group);
	}


	public function all(){

		$events = Calendar::all();
		return $events;
	}












}