<?php

use Repositories\UserRepository;

class ProfileManagmentController extends \BaseController {

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
		//


		return View::make('profile.index');
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
		//
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

		$credentials = Input::all();
		$update = $this->userRepository->updateUser($id,$credentials);

		if(Input::hasFile('p_photo')){
			$img = Input::file('p_photo');
			$ext = $img->getClientOriginalExtension();
			$filename = uniqid().'.'.$ext;
			$path = public_path('uploads/'.$filename);

			if(Image::make($img->getRealPath())->save($path))
			{
				$find = Pics::where('user_id','=',$id)->first();;
				if($find){
					$pics = Pics::where('user_id','=',$id)->firstOrFail();;
					$pics->name = $filename;
					$pics->save();

				}else {
						$pics = new Pics();
						$pics->name = $filename;
						$pics->user_id = $id;
						$pics->save();
				}
			}

		}


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
		//
	}


}
