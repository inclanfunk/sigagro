<?php

use Repositories\FarmRepository;

class FarmManagmentController extends \BaseController {

	public function __construct(FarmRepository $farmRepository){

		$this->farmRepository = $farmRepository;

	}



	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// show list of farms
		$farms = $this->farmRepository->listFarms();

		return View::make('farm.index', compact('farms'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// Show Farm Create Form

		$managers = $this->farmRepository->listManagers();

		return View::make('farm.create' , compact('managers'));

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//

		$credentials = Input::all();

		$store = $this->farmRepository->createFarm($credentials);

		if($store){
			return Redirect::back()->with('message','Farm is created.');
		}else{
			return Redirect::back()->with('message','Whoops, looks like something went wrong!');
		}


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
		//find farm
		$farm =	$this->farmRepository->findById($id);
		return View::make('farm.edit',compact('farm'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		$credentials = Input::all();

		$update = $this->farmRepository->updateFarm($id,$credentials);

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
		// delete the farm
		$farm = $this->farmRepository->deleteFarm($id);

		if(!$farm){
			return Redirect::back()->with('message','Delete is OK');
		}else {
			return Redirect::back()->with('message','Whoops, looks like something went wrong!');
		}

	}


}
