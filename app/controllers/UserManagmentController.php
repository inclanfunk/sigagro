<?php

use Repositories\UserRepository;

class UserManagmentController extends \BaseController {


	public function __construct(UserRepository $userRepository){

		$this->userRepository = $userRepository;

	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Get All Users
		$users = $this->userRepository->listAll();
		return View::make('user.index' , compact('users'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//



	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//find user
		$user =	$this->userRepository->findById($id);
		return View::make('user.edit',compact('user'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$rules = [
			'first_name' => 'required',
			'last_name' => 'required',
			'email' => 'required|email',
			'password_confirm' => 'same:password',
			'password' => 'same:password_confirm',
		];

		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);
		// Update the User

		$credentials = Input::all();

		$update = $this->userRepository->updateUser($id,$credentials);

		if($update){
			return Redirect::back()->with('message','Update is OK');
		}else{
			return Redirect::back()->with('message','Whoops, looks like something went wrong!');
		}


	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		// delete user
		$delete = $this->userRepository->deleteUser($id);

		if(!$delete){
			return Redirect::back()->with('message','Delete is OK');
		}else{
			return Redirect::back()->with('message','Whoops, looks like something went wrong!');
		}

	}


}
