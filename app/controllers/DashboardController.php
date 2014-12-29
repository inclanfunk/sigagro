<?php

class DashboardController extends BaseController {

	public function Index(){

		return View::make('admin.index');
	}


}