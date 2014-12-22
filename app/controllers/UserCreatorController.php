<?php

use Repositories\UserRepository;

class UserCreatorController extends BaseController {


	public function __construct(UserRepository $userRepository)
	{
		$this->userRepository = $userRepository;
	}



	public function showForm()
	{
		return View::make('user.creator_form.form');
	}


	public function sendForm()
	{
			$credentials = Input::all();

			$state =  $this->userRepository->UserSave($credentials);

			if($state){
				Session::flash('message', "New user account is created.");
				return Redirect::back();
			}else {
				Session::flash('message', "Whoops, looks like something went wrong!");
				return Redirect::back();
			}


	}





}
