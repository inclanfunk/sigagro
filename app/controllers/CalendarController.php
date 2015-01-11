<?php

class CalendarController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$events = Calendar::all();
		return View::make('calendar.index' , compact('events'));
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{


	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// validation
		$rules = [
			'title' => 'required',
			'mystartdate' => 'required',
			'myenddate' => 'required',
		];

		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);


		$calendar = new Calendar();
		$calendar->title = Input::get('title');
		$calendar->description = Input::get('description');
		$calendar->start = Input::get('mystartdate');
		$calendar->end = Input::get('myenddate');
		$calendar->className = Input::get('color');

		$calendar->save();

		if($calendar){
			return Redirect::back()->with('message','Event is created.');
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
		$event = Calendar::findOrFail($id);
		return View::make('calendar.edit',compact('event'));
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		// validation
		$rules = [
			'title' => 'required',
			'mystartdate' => 'required',
			'myenddate' => 'required',
		];

		$validator = Validator::make(Input::all(),$rules);
		if($validator->fails()) return Redirect::back()->withErrors($validator);


		$calendar = Calendar::findOrFail($id);
		$calendar->title = Input::get('title');
		$calendar->description = Input::get('description');
		$calendar->start = Input::get('mystartdate');
		$calendar->end = Input::get('myenddate');
		$calendar->className = Input::get('color');
		$calendar->save();

		if($calendar){
			return Redirect::back()->with('message','Event is updated.');
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
		$delete = Calendar::findOrFail($id);
		$delete->delete();

		if($delete){
			return Redirect::back()->with('message2','Delete is OK');
		}else{
			return Redirect::back()->with('message2','Whoops, looks like something went wrong!');
		}

	}


}
